<?php
/**
 * CSV Parser Implementation using Keboola CSV Reader
 *
 * PHP version 5.3
 *
 * @category  Collmex
 * @package   CSV
 * @author    Marcus Jaschen <mail@marcusjaschen.de>
 * @copyright 2013 Marcus Jaschen
 * @license   http://www.opensource.org/licenses/mit-license MIT License
 * @link      http://github.com/mjaschen/collmex
 */

namespace MarcusJaschen\Collmex\Csv;

/**
 * CSV Parser Implementation using Keboola CSV Reader
 *
 * @category Collmex
 * @package  CSV
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     http://github.com/mjaschen/collmex
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
    public function __construct($delimiter = ';', $enclosure = '"')
    {
        $this->delimiter = $delimiter;
        $this->enclosure = $enclosure;
    }

    /**
     * @param string $csv one or multiple lines of CSV data
     *
     * @return array
     */
    public function parse($csv)
    {
        $tmpHandle = tmpfile();
        fwrite($tmpHandle, $csv);
        rewind($tmpHandle);

        $data = array();

        while ($line = fgetcsv($tmpHandle, 0, $this->delimiter, $this->enclosure)) {
            $data[] = $line;
        }

        fclose($tmpHandle);

        return $data;
    }
}
