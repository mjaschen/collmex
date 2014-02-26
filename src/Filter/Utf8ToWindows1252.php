<?php
/**
 * Filter to convert UTF-8 to Windows 1252 encoding
 *
 * PHP version 5.3
 *
 * @category  Collmex
 * @package   Filter
 * @author    Marcus Jaschen <mail@marcusjaschen.de>
 * @copyright 2013 Marcus Jaschen
 * @license   http://www.opensource.org/licenses/mit-license MIT License
 * @link      http://github.com/mjaschen/collmex
 */

namespace MarcusJaschen\Collmex\Filter;

use Straube\UTF8\Encoding;

/**
 * Filter to convert UTF-8 to Windows 1252 encoding
 *
 * @category Collmex
 * @package  Filter
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     http://github.com/mjaschen/collmex
 */
class Utf8ToWindows1252 implements FilterInterface
{
    /**
     * @param mixed $input string or array
     *
     * @return mixed
     */
    public function filter($input)
    {
        // The Encoding methods are array-aware so we can just drop our input
        // into the conversion method.

        return Encoding::toWin1252($input);
    }
}