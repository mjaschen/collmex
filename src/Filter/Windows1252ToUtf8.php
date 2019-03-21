<?php
declare(strict_types=1);

namespace MarcusJaschen\Collmex\Filter;

use ForceUTF8\Encoding;

/**
 * Filter to convert Windows 1252 to UTF-8 encoding.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
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
    public function filter(string $input): string
    {
        return Encoding::toUTF8($input);
    }

    /**
     * @param string $text
     *
     * @return string
     */
    public function filterString(string $text): string
    {
        return Encoding::toUTF8($text);
    }

    /**
     * @param array $input
     *
     * @return array
     */
    public function filterArray(array $input): array
    {
        // The Encoding methods are array-aware so we can just drop our input
        // into the conversion method.

        return (array)Encoding::toUTF8($input);
    }
}
