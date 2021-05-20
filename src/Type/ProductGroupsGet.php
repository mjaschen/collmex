<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Product Groups Get Type.
 *
 * @author  Marcus Jaschen <mjaschen@gmail.com>
 * @author  Timo Paul <mail@timopaul.biz>
 *
 * @property $type_identifier
 */
class ProductGroupsGet extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'PRODUCT_GROUPS_GET',
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
