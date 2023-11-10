<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex;

use MarcusJaschen\Collmex\Client\Exception\RequestFailedException;
use MarcusJaschen\Collmex\Exception\InvalidResponseMimeTypeException;
use MarcusJaschen\Collmex\Exception\RequestErrorException;
use MarcusJaschen\Collmex\Response\ResponseFactory;
use MarcusJaschen\Collmex\Response\ResponseInterface;
use MarcusJaschen\Collmex\Type\TypeInterface;

class MultiRequest extends AbstractRequest
{
    private array $types = [];

    public function add(TypeInterface $type): self
    {
        $this->types[] = $type;

        return $this;
    }

    /**
     * Adds multiple types for the request.
     *
     * @param TypeInterface[] $types
     */
    public function push(array $types): self
    {
        foreach ($types as $type) {
            $this->add($type);
        }

        return $this;
    }

    /**
     * @throws RequestErrorException
     */
    private function buildRequestBody(): string
    {
        if (count($this->types) === 0) {
            throw new RequestErrorException('Request data empty', 7_294_275_601);
        }

        return implode(
            PHP_EOL,
            array_map(
                static fn($type): string => $type->getCsv(),
                $this->types
            )
        );
    }

    /**
     * @throws InvalidResponseMimeTypeException
     * @throws RequestFailedException
     * @throws RequestErrorException
     */
    public function send(): ResponseInterface
    {
        $response = $this->client->request($this->buildRequestBody());

        $responseType = new ResponseFactory($response, $this->responseParser);

        return $responseType->getResponseInstance();
    }
}
