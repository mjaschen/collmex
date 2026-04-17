<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Client;

use MarcusJaschen\Collmex\Csv\Generator;
use MarcusJaschen\Collmex\Filter\Utf8ToWindows1252;

abstract class AbstractClient
{
    final public const EXCHANGE_URL = 'https://www.collmex.de/c.cmx?%s,0,data_exchange';

    protected string $exchangeUrl;

    protected bool $useUtf8 = false;

    public function __construct(
        protected string $user,
        protected string $password,
        string $customer,
        bool $useUtf8 = false,
    ) {
        $this->exchangeUrl = sprintf(static::EXCHANGE_URL, $customer);
        $this->useUtf8 = $useUtf8;
    }

    protected function convertEncodingForCollmex(string $text): string
    {
        if ($this->useUtf8) {
            return $text;
        }

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

        $fields = ['LOGIN', $this->user, $this->password];

        if ($this->useUtf8) {
            $fields[] = '1';
        }

        return $csvGenerator->generate($fields);
    }
}
