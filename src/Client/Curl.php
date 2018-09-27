<?php

namespace MarcusJaschen\Collmex\Client;

use MarcusJaschen\Collmex\Client\Exception\RequestFailedException;

/**
 * curl Client Class
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     https://github.com/mjaschen/collmex
 */
class Curl extends AbstractClient implements ClientInterface
{
    /**
     * @var resource
     */
    protected $curl;

    /**
     * Executes the actual HTTP request and creates the Response object
     *
     * @param $body
     *
     * @return string The response body
     *
     * @throws Exception\RequestFailedException
     */
    public function request($body)
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

        $this->destroyCurl();

        return (string)$response;
    }

    /**
     * Creates curl ressource.
     *
     * @return void
     */
    protected function initCurl()
    {
        $this->curl = curl_init($this->exchangeUrl);
        curl_setopt($this->curl, CURLOPT_POST, true);
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, ['Content-Type: text/csv']);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
    }

    /**
     * Closes curl ressource.
     *
     * @return void
     */
    protected function destroyCurl()
    {
        if (! empty($this->curl)) {
            curl_close($this->curl);
        }
    }

    /**
     * Prepend the login credentials to the request body.
     *
     * @param $body
     *
     * @return string
     */
    protected function buildRequestBody($body)
    {
        return $this->getLoginLine() . $body;
    }
}
