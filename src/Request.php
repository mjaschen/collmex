<?php
/**
 * Collmex API Request
 *
 * PHP version 5.3
 *
 * @category  Collmex
 * @package   Request
 * @author    Marcus Jaschen <mail@marcusjaschen.de>
 * @copyright 2013 Marcus Jaschen
 * @license   http://www.opensource.org/licenses/mit-license MIT License
 * @link      http://github.com/mjaschen/collmex
 */

namespace MarcusJaschen\Collmex;

use MarcusJaschen\Collmex\Client\ClientInterface;
use MarcusJaschen\Collmex\Csv\ParserInterface;
use MarcusJaschen\Collmex\Csv\SimpleParser;
use MarcusJaschen\Collmex\Response\ResponseFactory;

/**
 * Collmex API Request
 *
 * @category Collmex
 * @package  Request
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     http://github.com/mjaschen/collmex
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
        $this->client = $client;

        if (is_null($responseParser)) {
            $this->responseParser = new SimpleParser();
        } else {
            $this->responseParser = $responseParser;
        }
    }

    /**
     * Sends an API request and returns the response object
     *
     * @param string $body The request body
     *
     * @return Response
     */
    public function send($body)
    {
        $response = $this->client->request($body);

        $responseType = new ResponseFactory($response, $this->responseParser);

        return $responseType->getResponseInstance();
    }
}