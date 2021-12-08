<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex;

use MarcusJaschen\Collmex\Client\ClientInterface;
use MarcusJaschen\Collmex\Csv\Parser;

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
     * @var Parser
     */
    protected $responseParser;

    /**
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;

        $this->responseParser = new Parser();
    }
}
