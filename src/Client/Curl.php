<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Client;

use CurlHandle;
use MarcusJaschen\Collmex\Client\Exception\RequestFailedException;

class Curl extends AbstractClient implements ClientInterface
{
    protected CurlHandle $curl;

    /**
     * Executes the actual HTTP request and creates the Response object.
     *
     * @throws RequestFailedException
     */
    #[\Override]
    public function request(string $body): string
    {
        $this->initCurl();

        $requestBody = $this->buildRequestBody($body);

        curl_setopt(
            $this->curl,
            CURLOPT_POSTFIELDS,
            $this->convertEncodingForCollmex($requestBody)
        );

        $response = curl_exec($this->curl);

        if ($response === false) {
            throw new RequestFailedException(
                'Curl request failed: ' . curl_error($this->curl) . ' (' . curl_errno($this->curl) . ' )'
            );
        }

        return (string)$response;
    }

    /**
     * @throws \RuntimeException
     */
    protected function initCurl(): void
    {
        $curlHandle = curl_init($this->exchangeUrl);

        if ($curlHandle === false) {
            throw new \RuntimeException('Cannot create a curl handle', 9007569411);
        }

        $this->curl = $curlHandle;

        curl_setopt($this->curl, CURLOPT_POST, true);
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, ['Content-Type: text/csv']);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
    }

    /**
     * Prepend the login credentials to the request body.
     */
    protected function buildRequestBody(string $body): string
    {
        return $this->getLoginLine() . $body;
    }
}
