<?php
/**
 * Type Field Validator Interface
 *
 * PHP version 5.3
 *
 * @category  Collmex
 * @package   Validator
 * @author    Marcus Jaschen <mail@marcusjaschen.de>
 * @copyright 2013 Marcus Jaschen
 * @license   http://www.opensource.org/licenses/mit-license MIT License
 * @link      http://github.com/mjaschen/collmex
 */

namespace MarcusJaschen\Collmex\Type\Validator;

/**
 * Type Field Validator Interface
 *
 * @category  Collmex
 * @package   Validator
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     http://github.com/mjaschen/collmex
 */
interface ValidatorInterface
{
    /**
     * Validates a value
     *
     * @param mixed $value
     * @param array $options
     *
     * @return bool Validation success
     */
    public function validate($value, $options = array());
}