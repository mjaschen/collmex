<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Csv;

class Parser
{
    private const PLACEHOLDER_FGETCSV_BUG = 'MJASCHEN_COLLMEX_WORKAROUND_PHP_FGETCSV_BUG';

    /**
     * The parser is doing some extras to work around a bug in PHP's CSV parser.
     * If there's a backslash followed by a double-quote in the data (which is
     * escaped to `\""` in the CSV representation), PHP's CSV parser assumes that
     * the field ends here and failes to parse the CSV data correctly.
     *
     * Similar to the workaround for the CSV generator we insert a special string
     * (`self::PLACEHOLDER_FGETCSV_BUG`) into the source data and restore the
     * original string _after_ the parser is done.
     *
     * @see Generator
     * @see \MarcusJaschen\Collmex\Tests\Unit\Csv\ParserTest::parseBackslashFollowedByDoubleQuote()
     * @see https://github.com/mjaschen/collmex/issues/238
     */
    public function parse(string $csv): array
    {
        $tmpHandle = tmpfile();
        fwrite($tmpHandle, str_replace('\\""', self::PLACEHOLDER_FGETCSV_BUG . '""', $csv));
        rewind($tmpHandle);

        $data = [];

        while ($csvLine = fgetcsv($tmpHandle, 0, FormatInterface::DELIMITER, FormatInterface::ENCLOSURE, '')) {
            $data[] = array_map(
                static function ($item) {
                    if (!is_string($item)) {
                        return $item;
                    }

                    return str_replace(self::PLACEHOLDER_FGETCSV_BUG, '\\', $item);
                },
                $csvLine
            );
        }

        fclose($tmpHandle);

        return $data;
    }
}
