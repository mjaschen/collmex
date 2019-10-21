<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type\Validator;

/**
 * Date Validator.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 */
class DateOrEmpty extends Date implements ValidatorInterface
{
    /**
     * Validates a date value.
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
        if (empty($value)) {
            return true;
        }

        return parent::validate($value, $options);
    }
}
