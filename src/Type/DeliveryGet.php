<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Delivery Get Type.
 *
 * @author  Marcus Jaschen <mjaschen@gmail.com>
 * @author  René Galle <renegalle.webdevelopment@gmail.com>
 *
 * @property $type_identifier
 * @property $delivery_id
 * @property $client_id
 * @property $customer_id
 * @property $delivery_date_from
 * @property $delivery_date_to
 * @property $issued_only
 * @property $returned_format
 * @property $changed_only
 * @property $system_name
 * @property $no_writing_paper
 * @property $order_id
 * @property $shipment_type
 * @property $mark_as_issued
 */
class DeliveryGet extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'DELIVERY_GET',
        'delivery_id' => null,
        'client_id' => null,
        'customer_id' => null,
        'delivery_date_from' => null,
        'delivery_date_to' => null,
        'issued_only' => null,
        'returned_format' => null,
        'changed_only' => null,
        'system_name' => null,
        'no_writing_paper' => null,
        'order_id' => null,
        'shipment_type' => null,
        'mark_as_issued' => null,
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
