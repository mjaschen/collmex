<?php
namespace MarcusJaschen\Collmex\Response;

use MarcusJaschen\Collmex\Csv\ParserInterface;
use MarcusJaschen\Collmex\Filter\Windows1252ToUtf8;
use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\TypeFactory;

/**
 * Collmex API Response
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     https://github.com/mjaschen/collmex
 */
class CsvResponse implements ResponseInterface
{
    /**
     * @var ParserInterface
     */
    protected $parser;

    /**
     * The unparsed response CSV string
     *
     * @var string
     */
    protected $responseRaw;

    /**
     * The response CSV parsed into an array (each CSV line an array element)
     *
     * @var array
     */
    protected $response;

    /**
     * @var array of raw response data
     */
    protected $data;

    /**
     * @var AbstractType[]
     */
    protected $records;

    /**
     * Whether the response contains an error message or not
     *
     * @var bool|null
     */
    protected $isError;

    /**
     * Collmex error-code
     * @var string
     */
    protected $errorCode;

    /**
     * @var string
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
    public function __construct(ParserInterface $parser, $responseBody)
    {
        $this->parser      = $parser;
        $this->responseRaw = $responseBody;

        $this->parseCsv($responseBody);
    }

    /**
     * @param string $responseBody
     *
     * @return void
     */
    public function parseCsv($responseBody)
    {
        $this->data = $this->convertEncodingFromCollmex(
            $this->parser->parse(
                $responseBody
            )
        );
    }

    /**
     * Checks if the API request returned an error
     *
     * @return bool
     */
    public function isError()
    {
        // do not process the response data (again) if an error was
        // already detected
        if (null !== $this->isError) {
            return $this->isError;
        }

        foreach ($this->data as $data) {
            if ($data[0] === 'MESSAGE' && $data[1] === 'E') {
                $this->isError      = true;
                $this->errorCode    = $data[2];
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
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * @return string
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @return int
     */
    public function getErrorLine()
    {
        return $this->errorLine;
    }

    /**
     * Returns the unparsed contents of the Collmex response (CSV string).
     *
     * @return string
     */
    public function getResponseRaw()
    {
        return $this->responseRaw;
    }

    /**
     * Returns an array of all response records as Type objects.
     *
     * @return AbstractType[]|null
     *
     * @throws \MarcusJaschen\Collmex\Exception\InvalidTypeIdentifierException
     */
    public function getRecords()
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
     * @throws \MarcusJaschen\Collmex\Exception\InvalidTypeIdentifierException
     */
    public function getFirstRecord()
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
     * @throws \MarcusJaschen\Collmex\Exception\InvalidTypeIdentifierException
     */
    protected function createTypeRecords()
    {
        $typeFactory = new TypeFactory();

        foreach ($this->data as $data) {
            $this->records[] = $typeFactory->getType($data);
        }
    }

    /**
     * Converts response from Collmex API to UTF-8
     *
     * @param array $data
     *
     * @return array
     */
    protected function convertEncodingFromCollmex($data)
    {
        $filter = new Windows1252ToUtf8();

        return $filter->filterArray($data);
    }
}
