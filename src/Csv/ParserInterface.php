<?php
declare(strict_types=1);

namespace MarcusJaschen\Collmex\Csv;

/**
 * CSV Parser Interface
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     https://github.com/mjaschen/collmex
 */
interface ParserInterface
{
    /**
     * @param string $csv one or multiple lines of CSV data
     *
     * @return array
     */
    public function parse(string $csv): array;
}
