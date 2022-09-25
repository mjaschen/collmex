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
        if (strlen($value) === 8) {
            $date = \DateTime::createFromFormat('Ymd', $value);
        }

        if (strlen($value) === 10) {
            $date = \DateTime::createFromFormat('d.m.Y', $value);
        }

        if (!isset($date) || !($date instanceof \DateTime)) {
            return false;
        }

        if ((int)$date->format('Y') < 1900 || (int)$date->format('Y') > 2100) {
            return false;
        }

        return true;
    }
}
