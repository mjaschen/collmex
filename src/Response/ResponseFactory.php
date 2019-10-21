<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Response;

use MarcusJaschen\Collmex\Csv\ParserInterface;
use MarcusJaschen\Collmex\Exception\InvalidResponseMimeTypeException;
use Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException;
use Symfony\Component\HttpFoundation\File\File;

class ResponseFactory
{
    /**
     * @var string
     */
    protected $responseBody;

    /**
     * @var ParserInterface
     */
    protected $responseParser;

    /**
     * @param string $responseBody
     * @param ParserInterface $responseParser
     */
    public function __construct(string $responseBody, ParserInterface $responseParser)
    {
        $this->responseBody = $responseBody;
        $this->responseParser = $responseParser;
    }

    /**
     * Returns the class name which handles the response ('CsvResponse' or 'ZipResponse').
     *
     * @return ZipResponse|CsvResponse
     *
     * @throws InvalidResponseMimeTypeException
     */
    public function getResponseInstance(): ResponseInterface
    {
        try {
            $mimeType = $this->getResponseMimeType();
        } catch (\Exception $exception) {
            throw new InvalidResponseMimeTypeException('Cannot determine MIME type for response', 0, $exception);
        }

        if ($mimeType === 'application/zip') {
            return new ZipResponse($this->responseParser, $this->responseBody);
        }

        return new CsvResponse($this->responseParser, $this->responseBody);
    }

    /**
     * Determines MIME type of response body.
     *
     * @return string|null
     *
     * @throws FileNotFoundException
     */
    protected function getResponseMimeType(): ?string
    {
        $tmpFilename = tempnam(sys_get_temp_dir(), 'collmexphp_');
        file_put_contents($tmpFilename, $this->responseBody);

        $file = new File($tmpFilename);
        $mimeType = $file->getMimeType();

        unlink($tmpFilename);

        return $mimeType;
    }
}
