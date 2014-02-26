<?php
/**
 * Filter Interface
 *
 * PHP version 5.3
 *
 * @category  Collmex
 * @package   Filter
 * @author    Marcus Jaschen <mail@marcusjaschen.de>
 * @copyright 2013 Marcus Jaschen
 * @license   http://www.opensource.org/licenses/mit-license MIT License
 * @link      http://github.com/mjaschen/collmex
 */

namespace MarcusJaschen\Collmex\Filter;

/**
 * Filter Interface
 *
 * @category Collmex
 * @package  Filter
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     http://github.com/mjaschen/collmex
 */
interface FilterInterface
{
    /**
     * @param mixed $input
     *
     * @return mixed
     */
    public function filter($input);
}