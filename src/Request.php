<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex;

use MarcusJaschen\Collmex\Client\ClientInterface;
use MarcusJaschen\Collmex\Csv\ParserInterface;
use MarcusJaschen\Collmex\Csv\SimpleParser;
use MarcusJaschen\Collmex\Response\CsvResponse;
use MarcusJaschen\Collmex\Response\ResponseFactory;
use MarcusJaschen\Collmex\Response\ZipResponse;

/**
 * Collmex API Request.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 */
class Request
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var ParserInterface
     */
    protected $responseParser;

    /**
     * @param ClientInterface $client
     * @param ParserInterface $responseParser
     */
    public function __construct(ClientInterface $client, ParserInterface $responseParser = null)
    {
        $this->client = $client;

        if ($responseParser instanceof ParserInterface) {
            $this->responseParser = $responseParser;

            return;
        }

        $this->responseParser = new SimpleParser();
    }

    /**
     * Sends an API request and returns the response object.
     *
     * @param string $body The request body
     *
     * @return ZipResponse|CsvResponse
     * @throws \MarcusJaschen\Collmex\Exception\InvalidResponseMimeTypeException
     * @throws \MarcusJaschen\Collmex\Client\Exception\RequestFailedException
     */
    public function send(string $body)
    {
        $response = $this->client->request($body);

        $responseType = new ResponseFactory($response, $this->responseParser);

        return $responseType->getResponseInstance();
    }
}
