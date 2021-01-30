<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex;

use MarcusJaschen\Collmex\Client\Exception\RequestFailedException;
use MarcusJaschen\Collmex\Exception\InvalidResponseMimeTypeException;
use MarcusJaschen\Collmex\Exception\RequestErrorException;
use MarcusJaschen\Collmex\Response\CsvResponse;
use MarcusJaschen\Collmex\Response\ResponseFactory;
use MarcusJaschen\Collmex\Response\ZipResponse;
use MarcusJaschen\Collmex\Type\TypeInterface;

class MultiRequest extends AbstractRequest
{
    /**
     * @var array
     */
    private $types = [];

    /**
     * Adds a new type for the request.
     *
     * @param TypeInterface $type
     *
     * @return  MultiRequest
     */
    public function add(TypeInterface $type): self
    {
        $this->types[] = $type;

        return $this;
    }

    /**
     * Adds multiple types for the request.
     *
     * @param TypeInterface[] $types
     *
     * @return MultiRequest
     */
    public function push(array $types): self
    {
        foreach ($types as $type) {
            $this->add($type);
        }

        return $this;
    }

    /**
     * merges all request.
     *
     * @return string
     * @throws RequestErrorException
     */
    private function buildRequestBody(): string
    {
        if (0 === count($this->types)) {
            throw new RequestErrorException('Request data empty', 7294275601);
        }

        return implode(
            PHP_EOL,
            array_map(
                static function ($type): string {
                    return $type->getCsv();
                },
                $this->types
            )
        );
    }

    /**
     * Sends multiple API request and returns the response object.
     *
     * @return ZipResponse|CsvResponse
     *
     * @throws InvalidResponseMimeTypeException
     * @throws RequestFailedException
     * @throws RequestErrorException
     */
    public function send()
    {
        $response = $this->client->request($this->buildRequestBody());

        $responseType = new ResponseFactory($response, $this->responseParser);

        return $responseType->getResponseInstance();
    }
}
