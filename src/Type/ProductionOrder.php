<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Production Order Type.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @author   René Galle <renegalle.webdevelopment@gmail.com>
 *
 * @property $type_identifier
 * @property $production_order_id
 * @property $component_number
 * @property $client_id
 * @property $product_id_produced
 * @property $quantity_produced
 * @property $production_date_from
 * @property $production_date_to
 * @property $production_duration
 * @property $approved
 * @property $finished
 * @property $header_text
 * @property $bill_of_meterial_version
 * @property $reserved_01
 * @property $reserved_02
 * @property $reserved_03
 * @property $reserved_04
 * @property $product_id_component
 * @property $quantity_component
 * @property $due_date_component
 * @property $bill_of_material_position
 */
class ProductionOrder extends AbstractType implements TypeInterface
{
    /**
     * Note: the field `bill_of_meterial_version` is misspelled. It will be fixed
     * in the next major release (as it's breaking backwards compatibility).
     * A pull request is already pending: https://github.com/mjaschen/collmex/pull/195
     *
     * @var array
     */
    protected $template = [
        'type_identifier' => 'PRODUCTION_ORDER',
        'production_order_id' => null,
        'component_number' => null,
        'client_id' => null,
        'product_id_produced' => null,
        'quantity_produced' => null,
        'production_date_from' => null,
        'production_date_to' => null,
        'production_duration' => null,
        'approved' => null,
        'finished' => null,
        'header_text' => null,
        'bill_of_meterial_version' => null,
        'reserved_01' => null,
        'reserved_02' => null,
        'reserved_03' => null,
        'reserved_04' => null,
        'product_id_component' => null,
        'quantity_component' => null,
        'due_date_component' => null,
        'bill_of_material_position' => null,
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
