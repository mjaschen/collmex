<?php

namespace MarcusJaschen\Collmex\Client;

/**
 * API Client Interface
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     https://github.com/mjaschen/collmex
 */
interface ClientInterface
{
    /**
     * Executes the actual HTTP request and creates the Response object
     *
     * @param $body
     *
     * @return string The response body
     *
     * @throws Exception\RequestFailedException
     */
    public function request(string $body): string;
}
