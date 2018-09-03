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
    public function __construct($delimiter = ';', $enclosure = '"')
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
     */
    public function parse($csv)
    {
        $input = Reader::createFromString($csv);

        $input->setDelimiter($this->delimiter);
        $input->setEnclosure($this->enclosure);

        return $input->fetchAll();
    }
}
