<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Production Order Get Type.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @author   René Galle <renegalle.webdevelopment@gmail.com>
 *
 * @property $type_identifier
 * @property $production_order_id
 * @property $client_id
 * @property $product_id_produced
 * @property $product_id_component
 * @property $open
 * @property $production_order_date
 * @property $changed_only
 * @property $system_name
 */
class ProductionOrderGet extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'PRODUCTION_ORDER_GET',
        'production_order_id' => null,
        'client_id' => null,
        'product_id_produced' => null,
        'product_id_component' => null,
        'open' => null,
        'production_order_date' => null,
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
