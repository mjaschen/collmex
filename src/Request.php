<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex;

use MarcusJaschen\Collmex\Client\Exception\RequestFailedException;
use MarcusJaschen\Collmex\Exception\InvalidResponseMimeTypeException;
use MarcusJaschen\Collmex\Response\ResponseFactory;
use MarcusJaschen\Collmex\Response\ResponseInterface;

class Request extends AbstractRequest
{
    /**
     * Sends an API request and returns the response object.
     *
     * @throws InvalidResponseMimeTypeException
     * @throws RequestFailedException
     */
    public function send(string $body): ResponseInterface
    {
        $response = $this->client->request($body);

        $responseType = new ResponseFactory($response, $this->responseParser);

        return $responseType->getResponseInstance();
    }
}
