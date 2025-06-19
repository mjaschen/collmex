<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Filter;

use InvalidArgumentException;

class Windows1252ToUtf8 extends AbstractFilter
{
    /**
     * @throws InvalidArgumentException
     */
    #[\Override]
    public function filterString(string $text): string
    {
        $result = mb_convert_encoding($text, 'UTF-8', 'Windows-1252');

        if ($result === false) {
            throw new InvalidArgumentException('Cannot convert string to UTF-8', 8_609_163_127);
        }

        return $result;
    }
}
