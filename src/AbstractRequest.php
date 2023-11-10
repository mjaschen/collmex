<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex;

use MarcusJaschen\Collmex\Client\ClientInterface;
use MarcusJaschen\Collmex\Csv\Parser;

abstract class AbstractRequest implements RequestInterface
{
    protected Parser $responseParser;

    public function __construct(protected ClientInterface $client)
    {
        $this->responseParser = new Parser();
    }
}
