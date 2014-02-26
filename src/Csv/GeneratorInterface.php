<?php
/**
 * CSV Generator Interface
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
 * CSV Generator Interface
 *
 * @category Collmex
 * @package  CSV
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     http://github.com/mjaschen/collmex
 */
interface GeneratorInterface
{
    /**
     * Generates a CSV string from given array data
     *
     * @param array $data
     *
     * @return string
     */
    public function generate(array $data);
}