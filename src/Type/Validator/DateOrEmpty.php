<?php

namespace MarcusJaschen\Collmex\Type\Validator;

/**
 * Date Validator
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     https://github.com/mjaschen/collmex
 */
class DateOrEmpty extends Date implements ValidatorInterface
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
    public function validate($value, $options = [])
    {
        if (empty($value)) {
            return true;
        }

        return parent::validate($value, $options);
    }
}
