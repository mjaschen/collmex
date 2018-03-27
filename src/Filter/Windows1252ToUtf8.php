<?php
/**
 * Filter to convert Windows 1252 to UTF-8 encoding
 *
 * @author    Marcus Jaschen <mail@marcusjaschen.de>
 * @license   http://www.opensource.org/licenses/mit-license MIT License
 * @link      https://github.com/mjaschen/collmex
 */

namespace MarcusJaschen\Collmex\Filter;

use ForceUTF8\Encoding;

/**
 * Filter to convert Windows 1252 to UTF-8 encoding
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     https://github.com/mjaschen/collmex
 */
class Windows1252ToUtf8 implements FilterInterface
{
    /**
     * @param string $input string or array
     *
     * @return string
     *
     * @deprecated
     */
    public function filter($input)
    {
        return Encoding::toUTF8($input);
    }

    /**
     * @param string $text
     *
     * @return string
     */
    public function filterString($text)
    {
        return Encoding::toUTF8($text);
    }

    /**
     * @param array $input
     *
     * @return array
     */
    public function filterArray(array $input)
    {
        // The Encoding methods are array-aware so we can just drop our input
        // into the conversion method.

        return (array)Encoding::toUTF8($input);
    }
}
