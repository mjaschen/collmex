<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Filter;

use InvalidArgumentException;
use Symfony\Component\String\UnicodeString;

class Utf8ToWindows1252 extends AbstractFilter
{
    /**
     * @throws InvalidArgumentException
     */
    public function filterString(string $text): string
    {
        $result = mb_convert_encoding((string)(new UnicodeString($text)), 'Windows-1252', 'UTF-8');

        if ($result === false) {
            throw new InvalidArgumentException('Cannot convert string to Windows-1252', 2_132_076_004);
        }

        return $result;
    }
}
