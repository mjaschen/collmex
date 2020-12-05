<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex BillOfMaterial Type.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @author   René Galle <renegalle.webdevelopment@gmail.com>
 *
 * @property $type_identifier
 * @property $product_id
 * @property $client_id
 * @property $version
 * @property $assignment
 * @property $valid_from
 * @property $text
 * @property $reserved_1
 * @property $reserved_2
 * @property $reserved_3
 * @property $reserved_4
 * @property $reserved_5
 * @property $position
 * @property $component_product_id
 * @property $quantity
 * @property $allocation_base
 */
class BillOfMaterial extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'CMXBOM',
        'product_id' => null,
        'client_id' => null,
        'version' => null,
        'assignment' => null,
        'valid_from' => null,
        'text' => null,
        'reserved_1' => null,
        'reserved_2' => null,
        'reserved_3' => null,
        'reserved_4' => null,
        'reserved_5' => null,
        'position' => null,
        'component_product_id' => null,
        'quantity' => null,
        'allocation_base' => null,
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
