<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Client;

use MarcusJaschen\Collmex\Csv\Generator;
use MarcusJaschen\Collmex\Filter\Utf8ToWindows1252;

abstract class AbstractClient
{
    final public const EXCHANGE_URL = 'https://www.collmex.de/c.cmx?%s,0,data_exchange';

    protected string $exchangeUrl;

    public function __construct(protected string $user, protected string $password, string $customer)
    {
        $this->exchangeUrl = sprintf(static::EXCHANGE_URL, $customer);
    }

    protected function convertEncodingForCollmex(string $text): string
    {
        $filter = new Utf8ToWindows1252();

        return $filter->filterString($text);
    }

    /**
     * Creates the first line of the request body - it contains the
     * authentication credentials.
     */
    protected function getLoginLine(): string
    {
        $csvGenerator = new Generator();

        return $csvGenerator->generate(['LOGIN', $this->user, $this->password]);
    }
}
