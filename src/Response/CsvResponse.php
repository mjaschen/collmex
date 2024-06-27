<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Response;

use MarcusJaschen\Collmex\Csv\Parser;
use MarcusJaschen\Collmex\Exception\InvalidTypeIdentifierException;
use MarcusJaschen\Collmex\Filter\Windows1252ToUtf8;
use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\TypeFactory;

class CsvResponse implements ResponseInterface
{
    /**
     * Array containing lines of raw response data.
     *
     * @var array<array-key, array<array-key, string>|string>
     */
    protected array $data;

    /**
     * @var AbstractType[]|null
     */
    protected array|null $records = null;

    protected string|null $errorCode = null;

    protected string|null $errorMessage = null;

    /**
     * Line of request CSV where the error occurred.
     */
    protected int|null $errorLine = null;

    public function __construct(protected Parser $parser, protected string $responseRaw)
    {
        $this->data = $this->convertEncodingFromCollmex(
            $this->parser->parse($responseRaw)
        );
    }

    /**
     * Checks if the API request returned an error.
     */
    public function isError(): bool
    {
        foreach ($this->data as $data) {
            if (!$this->isErrorLine($data)) {
                continue;
            }

            $this->errorCode = $data[2];
            $this->errorMessage = $data[3];

            if (isset($data[4])) {
                $this->errorLine = (int)$data[4];
            }

            return true;
        }

        return false;
    }

    public function getErrorMessage(): string|null
    {
        return $this->errorMessage;
    }

    public function getErrorCode(): string|null
    {
        return $this->errorCode;
    }

    public function getErrorLine(): int|null
    {
        return $this->errorLine;
    }

    /**
     * Returns the unparsed contents of the Collmex response (CSV string).
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
    public function getRecords(): array|null
    {
        if ($this->isError()) {
            return null;
        }

        if (empty($this->data)) {
            return null;
        }

        if ($this->records === null) {
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
    public function getFirstRecord(): AbstractType|null
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
     * @param array<array-key, array<array-key, string>|string> $data
     *
     * @return string[]
     */
    private function convertEncodingFromCollmex(array $data): array
    {
        $filter = new Windows1252ToUtf8();

        return $filter->filterArray($data);
    }

    private function isErrorLine(array $lineData): bool
    {
        return $lineData[0] === 'MESSAGE' && $lineData[1] === 'E';
    }
}
