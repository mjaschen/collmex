<?php

namespace MarcusJaschen\Collmex\Type\Validator;

/**
 * Time Interval Validator
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     https://github.com/mjaschen/collmex
 */
class TimeInterval implements ValidatorInterface
{
    /**
     * Validates a date value
     *
     * Collmex date representation: `YYYYMMDD`
     *
     * @param mixed $value
     * @param array $options
     *
     * @return bool Validation success
     */
    public function validate($value, array $options = []): bool
    {
        return is_int($value) && $value >= 0 && $value <= 7;
    }
}
