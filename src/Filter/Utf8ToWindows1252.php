<?php
declare(strict_types=1);

namespace MarcusJaschen\Collmex\Filter;

use ForceUTF8\Encoding;

/**
 * Filter to convert UTF-8 to Windows 1252 encoding.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 */
class Utf8ToWindows1252 implements FilterInterface
{
    /**
     * @param string $input string or array
     *
     * @return string
     */
    public function filter(string $input): string
    {
        return Encoding::toWin1252($input);
    }

    /**
     * @param string $text
     *
     * @return string
     */
    public function filterString(string $text): string
    {
        return Encoding::toWin1252($text);
    }

    /**
     * @param array $input
     *
     * @return array
     */
    public function filterArray(array $input): array
    {
        return (array)Encoding::toWin1252($input);
    }
}
