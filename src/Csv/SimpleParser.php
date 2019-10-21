<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Csv;

/**
 * CSV Parser Implementation using PHP's built-in CSV handling capabilities.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 */
class SimpleParser implements ParserInterface
{
    /**
     * @var string
     */
    private const DELIMITER = ';';

    /**
     * @var string
     */
    private const ENCLOSURE = '"';

    /**
     * @param string $csv one or multiple lines of CSV data
     *
     * @return array
     */
    public function parse(string $csv): array
    {
        $tmpHandle = tmpfile();
        fwrite($tmpHandle, $csv);
        rewind($tmpHandle);

        $data = [];

        while ($line = fgetcsv($tmpHandle, 0, FormatInterface::DELIMITER, FormatInterface::ENCLOSURE)) {
            $data[] = $line;
        }

        fclose($tmpHandle);

        return $data;
    }
}
