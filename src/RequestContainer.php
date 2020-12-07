<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex;

use MarcusJaschen\Collmex\AbstractRequest;
use MarcusJaschen\Collmex\Exception\RequestErrorException;
use MarcusJaschen\Collmex\Response\ResponseFactory;
use MarcusJaschen\Collmex\Type\TypeInterface;

class RequestContainer extends AbstractRequest
{
    /**
     * @var array
     */
    private $types = [];

    /**
     * Adds a new type for the request
     * 
     * @param   TypeInterface $type
     * @return  \MarcusJaschen\Collmex\RequestContainer
     */
    public function add(TypeInterface $type): RequestContainer
    {
        $this->types[] = $type;
        return $this;
    }
    
    /**
     * Adds multiple types for the request
     * 
     * @param array $types
     * @return \MarcusJaschen\Collmex\RequestContainer
     */
    public function push(array $types): RequestContainer
    {
      foreach ($types as $type) {
        $this->add($type);
      }
      return $this;
    }
    
    /**
     * merges all request
     * 
     * @return string
     * @throws RequestErrorException
     */
    private function buildRequestBody(): string
    {
        if (0 == count($this->types)) {
            throw new RequestErrorException();
        }
      
        return implode(PHP_EOL, array_map(function($type) {
            return $type->getCsv();
        }, $this->types));
    }
    
    /**
     * Sends multiple API request and returns the response object.
     *
     * @param string $body The request body
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

