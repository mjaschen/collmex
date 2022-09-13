<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * @property $type_identifier
 * @property $client_id
 * @property $supplier_id
 * @property $supplier_name
 * @property $product_id
 * @property $product_description
 * @property $quantity_unit
 * @property $product_id_supplier
 * @property $description
 * @property $packaging_unit
 * @property $tax_rate
 * @property $priority
 * @property $reserved_1
 * @property $reserved_2
 * @property $reserved_3
 * @property $reserved_4
 * @property $reserved_5
 * @property $position
 * @property $valid_from
 * @property $valid_to
 * @property $delivery_time
 * @property $price
 * @property $currency
 * @property $price_quantity
 */
class SupplierAgreement extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'CMXVAG',
        'client_id' => null,
        'supplier_id' => null,
        'supplier_name' => null,
        // 5
        'product_id' => null,
        'product_description' => null,
        'quantity_unit' => null,
        'product_id_supplier' => null,
        'description' => null,
        // 10
        'packaging_unit' => null,
        'tax_rate' => null,
        'priority' => null,
        'reserved_1' => null,
        'reserved_2' => null,
        // 15
        'reserved_3' => null,
        'reserved_4' => null,
        'reserved_5' => null,
        'position' => null,
        'valid_from' => null,
        // 20
        'valid_to' => null,
        'delivery_time' => null,
        'price' => null,
        'currency' => null,
        'price_quantity' => null,
    ];

    public function validate(): bool
    {
        return true;
    }
}
