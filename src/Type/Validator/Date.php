<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type\Validator;

/**
 * Date Validator.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 */
class Date implements ValidatorInterface
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
        if (strlen($value) !== 8) {
            return false;
        }

        // 1900-01-01 to 2099-12-31 should be enough for everyone!
        if (!preg_match('/(19|20)\d\d(0[1-9]|1[012])(0[1-9]|[12][0-9]|3[01])/', $value)) {
            return false;
        }

        return true;
    }
}
