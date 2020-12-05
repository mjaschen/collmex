<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Response;

use MarcusJaschen\Collmex\Csv\ParserInterface;
use MarcusJaschen\Collmex\Exception\InvalidTypeIdentifierException;
use MarcusJaschen\Collmex\Filter\Windows1252ToUtf8;
use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\TypeFactory;

/**
 * Collmex API Response.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 */
class CsvResponse implements ResponseInterface
{
    /**
     * @var ParserInterface
     */
    protected $parser;

    /**
     * The unparsed response CSV string.
     *
     * @var string
     */
    protected $responseRaw;

    /**
     * @var array of raw response data
     */
    protected $data;

    /**
     * @var AbstractType[]|null
     */
    protected $records;

    /**
     * Whether the response contains an error message or not.
     *
     * @var bool|null
     */
    protected $isError;

    /**
     * Collmex error-code.
     *
     * @var string|null
     */
    protected $errorCode;

    /**
     * @var string|null
     */
    protected $errorMessage;

    /**
     * Line of request CSV where the error occurred.
     *
     * @var int
     */
    protected $errorLine;

    /**
     * @param ParserInterface $parser
     * @param string $responseBody
     */
    public function __construct(ParserInterface $parser, string $responseBody)
    {
        $this->parser = $parser;
        $this->responseRaw = $responseBody;

        $this->parseCsv($responseBody);
    }

    /**
     * @param string $responseBody
     *
     * @return void
     */
    private function parseCsv($responseBody): void
    {
        $this->data = $this->convertEncodingFromCollmex(
            $this->parser->parse(
                $responseBody
            )
        );
    }

    /**
     * Checks if the API request returned an error.
     *
     * @return bool
     */
    public function isError(): bool
    {
        // do not process the response data (again) if an error was
        // already detected
        if (null !== $this->isError) {
            return $this->isError;
        }

        foreach ($this->data as $data) {
            if ($data[0] === 'MESSAGE' && $data[1] === 'E') {
                $this->isError = true;
                $this->errorCode = $data[2];
                $this->errorMessage = $data[3];

                if (isset($data[4])) {
                    $this->errorLine = $data[4];
                }

                return true;
            }
        }

        $this->isError = false;

        return false;
    }

    /**
     * @return string|null
     */
    public function getErrorMessage(): ?string
    {
        return $this->errorMessage;
    }

    /**
     * @return string|null
     */
    public function getErrorCode(): ?string
    {
        return $this->errorCode;
    }

    /**
     * @return int
     */
    public function getErrorLine(): int
    {
        return (int)$this->errorLine;
    }

    /**
     * Returns the unparsed contents of the Collmex response (CSV string).
     *
     * @return string
     */
    public function getResponseRaw(): string
    {
        return $this->responseRaw;
    }

    /**
     * Returns an array of all response records as Type objects.
     *
     * @return AbstractType[]|null
     *
     * @throws InvalidTypeIdentifierException
     */
    public function getRecords(): ?array
    {
        if ($this->isError()) {
            return null;
        }

        if (empty($this->data)) {
            return null;
        }

        if (null === $this->records) {
            $this->createTypeRecords();
        }

        return $this->records;
    }

    /**
     * Returns the Type object of the first record (or null if response
     * contains no records).
     *
     * @return AbstractType|null
     *
     * @throws InvalidTypeIdentifierException
     */
    public function getFirstRecord(): ?AbstractType
    {
        $records = $this->getRecords();

        if (empty($records)) {
            return null;
        }

        return $records[0];
    }

    /**
     * Populates the $records attribute with Type objects, created
     * from $data attribute.
     *
     * @return void
     *
     * @throws InvalidTypeIdentifierException
     */
    private function createTypeRecords(): void
    {
        $typeFactory = new TypeFactory();

        foreach ($this->data as $data) {
            $this->records[] = $typeFactory->getType($data);
        }
    }

    /**
     * Converts response from Collmex API to UTF-8.
     *
     * @param string[] $data
     *
     * @return string[]
     */
    private function convertEncodingFromCollmex(array $data): array
    {
        $filter = new Windows1252ToUtf8();

        return $filter->filterArray($data);
    }
}
