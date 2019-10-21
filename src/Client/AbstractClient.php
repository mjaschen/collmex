<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Client;

use MarcusJaschen\Collmex\Csv\SimpleGenerator;
use MarcusJaschen\Collmex\Filter\Utf8ToWindows1252;

/**
 * Abstract Client Class.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 */
abstract class AbstractClient
{
    /**
     * The Collmex API endpoint URL template.
     *
     * @var string
     */
    public const EXCHANGE_URL = 'https://www.collmex.de/c.cmx?%s,0,data_exchange';

    /**
     * The Collmex API endpoint URL.
     *
     * @var string
     */
    protected $exchangeUrl;

    /**
     * @var string
     */
    protected $user;

    /**
     * @var string
     */
    protected $password;

    /**
     * @param string $user
     * @param string $password
     * @param string $customer
     */
    public function __construct(string $user, string $password, string $customer)
    {
        $this->user = $user;
        $this->password = $password;
        $this->exchangeUrl = sprintf(static::EXCHANGE_URL, $customer);
    }

    /**
     * Converts the text to Windows Codepage 1252 encoding.
     *
     * @param string $text
     *
     * @return string
     */
    protected function convertEncodingForCollmex(string $text): string
    {
        $filter = new Utf8ToWindows1252();

        return $filter->filterString($text);
    }

    /**
     * Creates the first line of the request body - it contains the
     * authentication credentials.
     *
     * @return string
     */
    protected function getLoginLine(): string
    {
        $csvGenerator = new SimpleGenerator();

        return $csvGenerator->generate(['LOGIN', $this->user, $this->password]);
    }
}
