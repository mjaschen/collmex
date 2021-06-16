<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex API notification Type.
 *
 * @see https://www.collmex.de/c.cmx?1005,1,help,api_benachrichtigungen
 *
 * @property string $type_identifier
 * @property string $system_name
 * @property int $event
 * @property string $url
 * @property int $inactive
 */
class ApiNotification extends AbstractType implements TypeInterface
{
    /**
     * @var int
     */
    public const EVENT_BOOKING_EXECUTED = 1;

    /**
     * @var int
     */
    public const EVENT_AVAILABLE_STOCK_CHANGED = 2;

    /**
     * @var int
     */
    public const EVENT_CUSTOMER_ORDER_CHANGED = 3;

    /**
     * @var int
     */
    public const EVENT_DELIVERY_CHANGED = 4;

    /**
     * @var int
     */
    public const EVENT_INVOICE_CHANGED = 5;

    /**
     * @var int
     */
    public const EVENT_QUOTATION_CHANGED = 6;

    /**
     * @var int
     */
    public const EVENT_STOCK_CHANGED = 7;

    /**
     * @var int
     */
    public const EVENT_PRODUCT_CHANGED = 8;

    /**
     * @var int
     */
    public const EVENT_CUSTOMER_SUPPLIER_ADDRESS_MEMBER_CHANGED = 9;

    /**
     * @var int
     */
    public const INACTIVE_ACTIVE = 0;

    /**
     * @var int
     */
    public const INACTIVE_INACTIVE = 1;

    /**
     * @var int
     */
    public const INACTIVE_DELETE = 2;

    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'API_NOTIFICATION',
        'system_name' => null,
        'event' => null,
        'url' => null,
        // 5
        'inactive' => null,
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
