<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex StockChange Type.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @author   René Galle <renegalle.webdevelopment@gmail.com>
 *
 * @property $type_identifier
 * @property $stock_change_id
 * @property $stock_change_position
 * @property $product_id
 * @property $stock_change_type
 * @property $quantity
 * @property $destination_location_id
 * @property $destination_stock_type
 * @property $destination_charge
 * @property $destination_charge_labeling
 * @property $reserved_1
 * @property $reserved_2
 * @property $source_location_id
 * @property $source_stock_type
 * @property $source_charge
 * @property $reserved_3
 * @property $reserved_4
 * @property $reserved_5
 * @property $supplier_order_id
 * @property $supplier_order_position
 * @property $delivery_id
 * @property $delivery_position
 * @property $production_order_id
 * @property $production_order_position
 * @property $invoice_id
 * @property $invoice_position
 * @property $cancel_stock_change_id
 * @property $cancel_stock_change_pos
 * @property $notice
 * @property $booked_date
 * @property $booked_time
 */
class StockChange extends AbstractType implements TypeInterface
{
    /**
     * @var int
     */
    public const STOCK_CHANGE_TYPE_WITHDRAWAL = 0;
    /**
     * @var int
     */
    public const STOCK_CHANGE_TYPE_INPUT = 1;
    /**
     * @var int
     */
    public const STOCK_CHANGE_TYPE_TRANSFER = 2;
    /**
     * @var int
     */
    public const STOCK_CHANGE_TYPE_INVENTORY = 3;

    /**
     * @var int
     */
    public const DESTINATION_STOCK_TYPE_FREE = 0;
    /**
     * @var int
     */
    public const DESTINATION_STOCK_TYPE_LOCKED = 1;

    /**
     * @var array
     */
    protected $template = [
        // 1
        'type_identifier' => 'STOCK_CHANGE',
        'stock_change_id' => null,
        'stock_change_position' => null,
        'product_id' => null,
        // 5
        'stock_change_type' => null,
        'quantity' => null,
        // 7-12: only STOCK_CHANGE_TYPE_INPUT, STOCK_CHANGE_TYPE_TRANSFER, STOCK_CHANGE_TYPE_INVENTORY
        'destination_location_id' => null,
        'destination_stock_type' => null,
        'destination_charge' => null,
        // 10
        'destination_charge_labeling' => null,
        'reserved_1' => null,
        'reserved_2' => null,
        // 13-18: only STOCK_CHANGE_TYPE_WITHDRAWAL, STOCK_CHANGE_TYPE_TRANSFER
        'source_location_id' => null,
        'source_stock_type' => null,
        // 15
        'source_charge' => null,
        'reserved_3' => null,
        'reserved_4' => null,
        'reserved_5' => null,
        'purchase_order_id' => null,
        // 20
        'purchase_order_position' => null,
        'delivery_id' => null,
        'delivery_position' => null,
        'production_order_id' => null,
        'production_order_position' => null,
        // 25
        'invoice_id' => null,
        'invoice_position' => null,
        'cancel_stock_change_id' => null,
        'cancel_stock_change_pos' => null,
        'notice' => null,
        // 30
        'booked_date' => null,
        'booked_time' => null,
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
