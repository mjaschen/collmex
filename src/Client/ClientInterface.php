<?php
/**
 * API Client Interface
 *
 * PHP version 5.3
 *
 * @category  Collmex
 * @package   Client
 * @author    Marcus Jaschen <mail@marcusjaschen.de>
 * @copyright 2013 Marcus Jaschen
 * @license   http://www.opensource.org/licenses/mit-license MIT License
 * @link      http://github.com/mjaschen/collmex
 */

namespace MarcusJaschen\Collmex\Client;

/**
 * API Client Interface
 *
 * @category Collmex
 * @package  Client
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     http://github.com/mjaschen/collmex
 */
interface ClientInterface
{
    /**
     * Executes the actual HTTP request and creates the Response object
     *
     * @param $body
     *
     * @return string The response body
     *
     * @throws Exception\RequestFailedException
     */
    public function request($body);
}