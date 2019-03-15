<?php

namespace MarcusJaschen\Collmex\Csv;

use League\Csv\Reader;

/**
 * CSV Parser Implementation using the CSV library from The PHP League.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     https://github.com/mjaschen/collmex
 * @link     http://csv.thephpleague.com/
 */
class LeagueCsvParser implements ParserInterface
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
     *
     * @throws \InvalidArgumentException
     * @throws \League\Csv\Exception
     */
    public function parse(string $csv): array
    {
        $reader = Reader::createFromString($csv);

        $reader->setDelimiter($this->delimiter)
            ->setEnclosure($this->enclosure);

        $result = [];
        foreach ($reader as $key => $record) {
            $result[$key] = $record;
        }

        return $result;
    }
}
