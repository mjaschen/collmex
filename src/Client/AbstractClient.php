<?php
/**
 * Abstract Client Class
 *
 * @author    Marcus Jaschen <mail@marcusjaschen.de>
 * @license   http://www.opensource.org/licenses/mit-license MIT License
 * @link      https://github.com/mjaschen/collmex
 */

namespace MarcusJaschen\Collmex\Client;

use MarcusJaschen\Collmex\Csv\SimpleGenerator;
use MarcusJaschen\Collmex\Filter\Utf8ToWindows1252;

/**
 * Abstract Client Class
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     https://github.com/mjaschen/collmex
 */
abstract class AbstractClient
{
    /**
     * The Collmex API endpoint URL template
     */
    const EXCHANGE_URL = "https://www.collmex.de/cgi-bin/cgi.exe?%s,0,data_exchange";

    /**
     * The Collmex API endpoint URL
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
    public function __construct($user, $password, $customer)
    {
        $this->user        = $user;
        $this->password    = $password;
        $this->exchangeUrl = sprintf(self::EXCHANGE_URL, $customer);
    }

    /**
     * Converts the text to Windows Codepage 1252 encoding
     *
     * @param string $text
     *
     * @return string
     */
    protected function convertEncodingForCollmex($text)
    {
        $filter = new Utf8ToWindows1252();

        return $filter->filter($text);
    }

    /**
     * Creates the first line of the request body - it contains the
     * authentication credentials.
     *
     * @return string
     */
    protected function getLoginLine()
    {
        $csvGenerator = new SimpleGenerator();

        return $csvGenerator->generate(array('LOGIN', $this->user, $this->password));
    }
}
