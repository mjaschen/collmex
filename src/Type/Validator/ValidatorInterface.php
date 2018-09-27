<?php

namespace MarcusJaschen\Collmex\Type\Validator;

/**
 * Type Field Validator Interface
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     https://github.com/mjaschen/collmex
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
    public function validate($value, $options = []);
}
