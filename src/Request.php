<?php

namespace MarcusJaschen\Collmex;

use MarcusJaschen\Collmex\Client\ClientInterface;
use MarcusJaschen\Collmex\Csv\ParserInterface;
use MarcusJaschen\Collmex\Csv\SimpleParser;
use MarcusJaschen\Collmex\Response\CsvResponse;
use MarcusJaschen\Collmex\Response\ResponseFactory;
use MarcusJaschen\Collmex\Response\ZipResponse;

/**
 * Collmex API Request
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     https://github.com/mjaschen/collmex
 */
class Request
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Csv\ParserInterface
     */
    protected $responseParser;

    /**
     * @param ClientInterface $client
     * @param Csv\ParserInterface $responseParser
     */
    public function __construct(ClientInterface $client, ParserInterface $responseParser = null)
    {
        $this->client         = $client;

        if ($responseParser instanceof ParserInterface) {
            $this->responseParser = $responseParser;

            return;
        }

        $this->responseParser = new SimpleParser();
    }

    /**
     * Sends an API request and returns the response object
     *
     * @param string $body The request body
     *
     * @return ZipResponse|CsvResponse
     * @throws \MarcusJaschen\Collmex\Exception\InvalidResponseMimeTypeException
     * @throws \MarcusJaschen\Collmex\Client\Exception\RequestFailedException
     */
    public function send($body)
    {
        $response = $this->client->request($body);

        $responseType = new ResponseFactory($response, $this->responseParser);

        return $responseType->getResponseInstance();
    }
}
