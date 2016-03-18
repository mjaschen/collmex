<?php

namespace MarcusJaschen\Collmex\Response;

use MarcusJaschen\Collmex\Csv\ParserInterface;
use Symfony\Component\HttpFoundation\File\File;

class ResponseFactory
{
    /**
     * @var string
     */
    protected $responseBody;

    /**
     * @var \MarcusJaschen\Collmex\Csv\ParserInterface
     */
    protected $responseParser;

    /**
     * @param string $reponseBody
     * @param \MarcusJaschen\Collmex\Csv\ParserInterface $responseParser
     */
    public function __construct($reponseBody, ParserInterface $responseParser)
    {
        $this->responseBody   = $reponseBody;
        $this->responseParser = $responseParser;
    }

    /**
     * Returns the class name which handles the response ('CsvResponse' or 'ZipResponse')
     *
     * @return string Class name
     */
    public function getResponseInstance()
    {
        $mimeType = $this->getResponseMimeType();

        switch ($mimeType) {
            case 'application/zip':
                return new ZipResponse($this->responseParser, $this->responseBody);
            default:
                return new CsvResponse($this->responseParser, $this->responseBody);
        }
    }

    /**
     * Determines MIME type of response body.
     *
     * @return null|string
     */
    protected function getResponseMimeType()
    {
        $tmpFilename = tempnam(sys_get_temp_dir(), 'collmexphp_');
        file_put_contents($tmpFilename, $this->responseBody);

        $file     = new File($tmpFilename);
        $mimeType = $file->getMimeType();

        unlink($tmpFilename);

        return $mimeType;
    }
}
