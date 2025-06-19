<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Response;

use MarcusJaschen\Collmex\Csv\Parser;
use MarcusJaschen\Collmex\Exception\InvalidResponseMimeTypeException;
use Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException;
use Symfony\Component\HttpFoundation\File\File;

class ResponseFactory
{
    public function __construct(protected string $responseBody, protected Parser $responseParser)
    {
    }

    /**
     * Returns the class name which handles the response ('CsvResponse' or 'ZipResponse').
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
     * @throws FileNotFoundException
     * @throws \RuntimeException
     */
    protected function getResponseMimeType(): string|null
    {
        $tmpFilename = tempnam(sys_get_temp_dir(), 'collmexphp_');

        if ($tmpFilename === false) {
            throw new \RuntimeException('Cannot create a tmp file for MIME type detection', 5276268253);
        }

        file_put_contents($tmpFilename, $this->responseBody);

        $file = new File($tmpFilename);
        $mimeType = $file->getMimeType();

        unlink($tmpFilename);

        return $mimeType;
    }
}
