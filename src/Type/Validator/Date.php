<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type\Validator;

class Date implements ValidatorInterface
{
    /**
     * Validates if date value complies with Collmex' requirements.
     *
     * Collmex date representation: `YYYYMMDD`
     *
     * @param mixed $value
     * @param array $options
     *
     * @return bool Validation success
     */
    #[\Override]
    public function validate($value, array $options = []): bool
    {
        try {
            $date = $this->createDateInstance($value);
        } catch (\InvalidArgumentException) {
            return false;
        }

        return (int)$date->format('Y') > 1900 && (int)$date->format('Y') < 2100;
    }

    private function createDateInstance($value): \DateTime
    {
        if (strlen((string)$value) === 8) {
            return \DateTime::createFromFormat('Ymd', $value);
        }

        if (strlen((string)$value) === 10) {
            return \DateTime::createFromFormat('d.m.Y', $value);
        }

        throw new \InvalidArgumentException('Invalid date format: ' . $value, 3_203_218_841);
    }
}
