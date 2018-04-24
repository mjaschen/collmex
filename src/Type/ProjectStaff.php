<?php

namespace MarcusJaschen\Collmex\Type;

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
    public function validate()
    {
        return true;
    }
}
