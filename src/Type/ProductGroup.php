<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Product Group Type.
 *
 * @author  Marcus Jaschen <mjaschen@gmail.com>
 * @author  Timo Paul <mail@timopaul.biz>
 *
 * @property $type_identifier
 * @property $product_group_id
 * @property $title
 * @property $parent
 */
class ProductGroup extends AbstractType implements TypeInterface
{
    /**
     * Type data template.
     *
     * @var array
     */
    protected $template = [
        // 1
        'type_identifier' => 'PRDGRP',
        'product_group_id' => null,
        'title' => null,
        'parent' => null,
    ];

    /**
     * Formally validates the type data in $data attribute.
     *
     * @return bool Validation success
     */
    public function validate(): bool
    {
        // TODO: Implement validate() method.
        return true;
    }
}
