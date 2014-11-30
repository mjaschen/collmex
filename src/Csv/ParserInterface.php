<?php
/**
 * CSV Parser Interface
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
 * CSV Parser Interface
 *
 * @category Collmex
 * @package  CSV
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     http://github.com/mjaschen/collmex
 */
interface ParserInterface
{
    /**
     * @param string $csv one or multiple lines of CSV data
     *
     * @return array
     */
    public function parse($csv);
}
