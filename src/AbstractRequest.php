<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex;

use MarcusJaschen\Collmex\Client\ClientInterface;
use MarcusJaschen\Collmex\Csv\SimpleParser;

/**
 * Abstract Collmex Request Class.
 *
 * @author Marcus Jaschen <mail@marcusjaschen.de>
 * @author Timo Paul <mail@timopaul.biz>
 */
abstract class AbstractRequest implements RequestInterface
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var SimpleParser
     */
    protected $responseParser;

    /**
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;

        $this->responseParser = new SimpleParser();
    }
}
