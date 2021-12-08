<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Filter;

use InvalidArgumentException;
use Symfony\Component\String\UnicodeString;

/**
 * Filter to convert UTF-8 to Windows 1252 encoding.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 */
class Utf8ToWindows1252 extends AbstractFilter
{
    /**
     * @throws InvalidArgumentException
     */
    public function filterString(string $text): string
    {
        $result = mb_convert_encoding((string)(new UnicodeString($text)), 'Windows-1252', 'UTF-8');

        if ($result === false) {
            throw new InvalidArgumentException('Cannot convert string to Windows-1252', 2132076004);
        }

        return $result;
    }
}
