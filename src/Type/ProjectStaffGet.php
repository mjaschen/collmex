<?php

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Project Staff Type
 *
 * @author  Marcus Jaschen <mjaschen@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license MIT License
 * @link    https://www.marcusjaschen.de/
 *
 * @property string $type_identifier
 * @property int $project_id
 */
class ProjectStaffGet extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'PROJECT_STAFF_GET',
        'project_id'      => null,
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
