<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex ShipmentOrdersGet Type.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @author   René Galle <renegalle.webdevelopment@gmail.com>
 *
 * @property $type_identifier
 * @property $delivery_id
 * @property $client_id
 * @property $customer_id
 * @property $shipment_handover_id
 * @property $shipment_type
 * @property $handover_required
 * @property $delivery_date_from
 * @property $delivery_date_to
 * @property $shipment_date
 */
class ShipmentOrdersGet extends AbstractType implements TypeInterface
{
    /**
     * @var int
     */
    public const SHIPMENT_HANDOVER_ID_UNIVERSAL_CSV = 1;
    /**
     * @var int
     */
    public const SHIPMENT_HANDOVER_ID_DHL_ONLINE_FRANKING = 2;
    /**
     * @var int
     */
    public const SHIPMENT_HANDOVER_ID_DHL_INTRASHIP = 3;
    /**
     * @var int
     */
    public const SHIPMENT_HANDOVER_ID_FULFILLMENT_SERVICE_PROVIDER = 4;
    /**
     * @var int
     */
    public const SHIPMENT_HANDOVER_ID_YOUR_GLS = 5;
    /**
     * @var int
     */
    public const SHIPMENT_HANDOVER_ID_HERMES = 6;
    /**
     * @var int
     */
    public const SHIPMENT_HANDOVER_ID_AMAZON_FBA = 7;
    /**
     * @var int
     */
    public const SHIPMENT_HANDOVER_ID_GERMAN_POST_INTERNET_STAMP = 8;
    /**
     * @var int
     */
    public const SHIPMENT_HANDOVER_ID_MY_DPD_BUSINESS = 9;
    /**
     * @var int
     */
    public const SHIPMENT_HANDOVER_ID_DHL_BUSINESS_CLIENT_PORTAL = 10;

    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'SHIPMENT_ORDERS_GET',
        'delivery_id' => null,
        'client_id' => null,
        'customer_id' => null,
        'shipment_handover_id' => null,
        'shipment_type' => null,
        'handover_required' => null,
        'delivery_date_from' => null,
        'delivery_date_to' => null,
        'shipment_date' => null,
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
