<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex ShipmentConfirm Type.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @author   René Galle <renegalle.webdevelopment@gmail.com>
 *
 * @property string $type_identifier
 * @property int $delivery_id
 * @property int $client_id
 * @property int $customer_id
 * @property int $mode_of_shipment
 * @property int $sent_to_shipment_company
 * @property string $tracking_code
 * @property string $delivery_date_from
 * @property string $not_confirmed
 */
class ShipmentConfirm extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'SHIPMENT_CONFIRM',
        'delivery_id' => null,
        'client_id' => null,
        'customer_id' => null,
        'mode_of_shipment' => null,
        'sent_to_shipment_company' => null,
        'use_tracking_code' => null,
        'delivery_date_from' => null,
        'not_confirmed' => null,
    ];

    /**
     * Formally validates the type data in $data attribute.
     *
     * @return bool Validation success
     */
    #[\Override]
    public function validate(): bool
    {
        return true;
    }
}
