<?php
declare(strict_types=1);

namespace MarcusJaschen\Collmex\Csv;

/**
 * CSV Parser Implementation using Keboola CSV Reader
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     https://github.com/mjaschen/collmex
 * @link     https://github.com/keboola/php-csv
 */
class SimpleParser implements ParserInterface
{
    /**
     * @var string
     */
    protected $delimiter;

    /**
     * @var string
     */
    protected $enclosure;

    /**
     * @param string $delimiter
     * @param string $enclosure
     */
    public function __construct(string $delimiter = ';', string $enclosure = '"')
    {
        $this->delimiter = $delimiter;
        $this->enclosure = $enclosure;
    }

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

        while ($line = fgetcsv($tmpHandle, 0, $this->delimiter, $this->enclosure)) {
            $data[] = $line;
        }

        fclose($tmpHandle);

        return $data;
    }
}
