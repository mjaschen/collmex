<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Project Staff Type.
 *
 * @author  Marcus Jaschen <mjaschen@gmail.com>
 *
 * @property string $type_identifier
 * @property int $project_id
 * @property int $staff_id
 * @property int $staff_company_id
 * @property string $name
 */
class ProjectStaff extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'PROJECT_STAFF',
        'project_id' => null,
        'staff_id' => null,
        'staff_company_id' => null,
        'name' => null,
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
