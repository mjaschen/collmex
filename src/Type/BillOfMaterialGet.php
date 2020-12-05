<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex BillOfMaterialGet Type.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @author   René Galle <renegalle.webdevelopment@gmail.com>
 *
 * @property $type_identifier
 * @property $client_id
 * @property $product_id
 * @property $assignment
 * @property $component_product_id
 * @property $changed_only
 * @property $system_name
 */
class BillOfMaterialGet extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'BILL_OF_MATERIAL_GET',
        'client_id' => null,
        'product_id' => null,
        'assignment' => null,
        'component_product_id' => null,
        'changed_only' => null,
        'system_name' => null,
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
