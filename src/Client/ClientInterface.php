<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Client;

/**
 * API Client Interface.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 */
interface ClientInterface
{
    /**
     * Executes the actual HTTP request and creates the Response object.
     *
     * @param $body
     *
     * @return string The response body
     *
     * @throws Exception\RequestFailedException
     */
    public function request(string $body): string;
}
