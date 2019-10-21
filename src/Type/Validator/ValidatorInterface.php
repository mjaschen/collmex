<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type\Validator;

/**
 * Type Field Validator Interface.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 */
interface ValidatorInterface
{
    /**
     * Validates a value.
     *
     * @param mixed $value
     * @param array $options
     *
     * @return bool Validation success
     */
    public function validate($value, array $options = []): bool;
}
