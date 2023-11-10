<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Client;

interface ClientInterface
{
    /**
     * Executes the actual HTTP request and creates the Response object.
     *
     * @throws Exception\RequestFailedException
     */
    public function request(string $body): string;
}
