<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Product Type.
 *
 * @author  Jewel Ahmed <tojibon@gmail.com>
 * @author  Marcus Jaschen <mjaschen@gmail.com>
 *
 * @property $type_identifier
 * @property $product_id
 * @property $product_description
 * @property $product_description_eng
 * @property $quantity_unit
 * @property $product_group
 * @property $client_id
 * @property $tax_rate
 * @property $weight
 * @property $weight_unit
 * @property $price_quantity
 * @property $product_type
 * @property $inactive
 * @property $price_group
 * @property $price
 * @property $ean
 * @property $manufacturer
 * @property $shipping_group
 * @property $minimum_quantity
 * @property $quantity
 * @property $lot_mandatory
 * @property $procurement
 * @property $production_time
 * @property $labor_costs
 * @property $labor_costs_reference_amount
 * @property $annotation
 * @property $costing
 * @property $costs
 * @property $reference_amount_cost
 * @property $purchase_supplier
 * @property $purchase_tax_rate
 * @property $product_number_supplier
 * @property $purchase_quantity_per_package
 * @property $purchase_description
 * @property $purchase_price
 * @property $purchase_price_quantity
 * @property $purchase_delivery_time
 * @property $purchase_currency
 * @property $reserved01
 * @property $reserved02
 * @property $website_id
 * @property $shop_short_text
 * @property $shop_long_text
 * @property $text_type
 * @property $filename
 * @property $keywords
 * @property $title
 * @property $template_id
 * @property $image_url
 * @property $base_price_quantity_product
 * @property $base_price_quantity_base_unit
 * @property $base_unit
 * @property $requested_price
 * @property $inactive_alt
 * @property $shop_category_ids
 * @property $reserved03
 * @property $reserved04
 * @property $reserved05
 * @property $product_number_manufacturer
 * @property $delivery_relevant
 * @property $amazon_asin
 * @property $ebay_item_number
 * @property $direct_delivery
 * @property $hs_code
 * @property $storage_bin
 */
class Product extends AbstractType implements TypeInterface
{
    /**
     * @var int
     */
    public const TAX_RATE_FULL = 0;
    /**
     * @var int
     */
    public const TAX_RATE_REDUCED = 1;
    /**
     * @var int
     */
    public const TAX_RATE_TAXFREE = 2;

    /**
     * @var int
     */
    public const BUY_TAX_RATE_FULL = 0;
    /**
     * @var int
     */
    public const BUY_TAX_RATE_REDUCED = 1;
    /**
     * @var int
     */
    public const BUY_TAX_RATE_TAXFREE = 2;

    /**
     * @var int
     */
    public const PRODUCT_TYPE_GOODS = 0;
    /**
     * @var int
     */
    public const PRODUCT_TYPE_SERVICE = 1;
    /**
     * @var int
     */
    public const PRODUCT_TYPE_MEMBERSHIP_FEE = 2;
    /**
     * @var int
     */
    public const PRODUCT_TYPE_CONSTRUCTION_SERVICE = 3;
    /**
     * @var int
     */
    public const PRODUCT_TYPE_GOODS_CUSTOMER_TAX = 4;

    /**
     * @var int
     */
    public const INACTIVE_PRODUCT_ACTIVE = 0;
    /**
     * @var int
     */
    public const INACTIVE_PRODUCT_INACTIVE = 1;
    /**
     * @var int
     */
    public const INACTIVE_PRODUCT_DELETE = 2;
    /**
     * @var int
     */
    public const INACTIVE_PRODUCT_DELETE_IF_INACTIVE = 3;

    /**
     * @var int
     */
    public const LOT_MANDATORY = 0;

    /**
     * @var int
     */
    public const TEXT_PLAIN = 0;
    /**
     * @var int
     */
    public const TEXT_HTML = 1;

    /**
     * @var int
     */
    public const PROCUREMENT_SHOPPING = 0;
    /**
     * @var int
     */
    public const PROCUREMENT_PRODUCTION = 10;

    /**
     * @var int
     */
    public const LABOR_COSTS_REFERENCE_AMOUNT = 1;

    /**
     * @var int
     */
    public const COSTING_AUTOMATIC = 0;
    /**
     * @var int
     */
    public const COSTING_MANUAL = 0;

    /**
     * @var int
     */
    public const BASIC_UNIT_NO_UNIT = 0;
    /**
     * @var int
     */
    public const BASIC_UNIT_KILOGRAM = 1;
    /**
     * @var int
     */
    public const BASIC_UNIT_LITER = 2;
    /**
     * @var int
     */
    public const BASIC_UNIT_CUBIC_METER = 3;
    /**
     * @var int
     */
    public const BASIC_UNIT_METER = 4;
    /**
     * @var int
     */
    public const BASIC_UNIT_SQUARE_METER = 5;
    /**
     * @var int
     */
    public const BASIC_UNIT_PIECE = 6;

    /**
     * @var int
     */
    public const DELIVERY_RELEVANCE_NO = 0;
    /**
     * @var int
     */
    public const DELIVERY_RELEVANCE_YES = 1;

    /**
     * @var int
     */
    public const DIRECT_DELIVERY_NO = 0;
    /**
     * @var int
     */
    public const DIRECT_DELIVERY_YES = 1;

    /**
     * Type data template.
     *
     * @var array
     */
    protected $template = [
        // 1
        'type_identifier' => 'CMXPRD',
        'product_id' => null,
        'product_description' => null,
        'product_description_eng' => null,
        'quantity_unit' => null,
        'product_group' => null,
        'client_id' => null,
        'tax_rate' => null,
        'weight' => null,
        // 10
        'weight_unit' => null,
        'price_quantity' => null,
        'product_type' => null,
        'inactive' => null,
        'price_group' => null,
        'price' => null,
        'ean' => null,
        'manufacturer' => null,
        'shipping_group' => null,
        'minimum_quantity' => null,
        // 20
        'quantity' => null,
        'lot_mandatory' => null,
        'procurement' => null,
        'production_time' => null,
        'labor_costs' => null,
        'labor_costs_reference_amount' => null,
        'annotation' => null,
        'costing' => null,
        'costs' => null,
        'reference_amount_cost' => null,
        // 30
        'purchase_supplier' => null,
        'purchase_tax_rate' => null,
        'product_number_supplier' => null,
        'purchase_quantity_per_package' => null,
        'purchase_description' => null,
        'purchase_price' => null,
        'purchase_price_quantity' => null,
        'purchase_delivery_time' => null,
        'purchase_currency' => null,
        'reserved01' => null,
        // 40
        'reserved02' => null,
        'website_id' => null,
        'shop_short_text' => null,
        'shop_long_text' => null,
        'text_type' => null,
        'filename' => null,
        'keywords' => null,
        'title' => null,
        'template_id' => null,
        'image_url' => null,
        // 50
        'base_price_quantity_product' => null,
        'base_price_quantity_base_unit' => null,
        'base_unit' => null,
        'requested_price' => null,
        'inactive_alt' => null,
        'shop_category_ids' => null,
        'reserved03' => null,
        'reserved04' => null,
        'reserved05' => null,
        'product_number_manufacturer' => null,
        // 60
        'delivery_relevant' => null,
        'amazon_asin' => null,
        'ebay_item_number' => null,
        'direct_delivery' => null,
        'hs_code' => null,
        // 65
        'storage_bin' => null,
    ];

    /**
     * Formally validates the type data in $data attribute.
     *
     * @return bool Validation success
     */
    public function validate(): bool
    {
        // TODO: Implement validate() method.
        return true;
    }
}
