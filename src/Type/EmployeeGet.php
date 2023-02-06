<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * @property string $type_identifier
 * @property int $employee_id
 * @property int $client_id
 * @property string $text
 */
class EmployeeGet extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'EMPLOYEE_GET',
        'employee_id' => null,
        'client_id' => null,
        'text' => null,
    ];

    /**
     * Formally validates the type data in $data attribute.
     *
     * @return bool Validation success
     */
    public function validate(): bool
    {
        return true;
    }
}
