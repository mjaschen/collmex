<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Product Group Type.
 *
 * @author  Marcus Jaschen <mjaschen@gmail.com>
 * @author  Timo Paul <mail@timopaul.biz>
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
class ProductGroup extends AbstractType implements TypeInterface
{
    /**
     * Type data template.
     *
     * @var array
     */
    protected $template = [
        // 1
        'type_identifier' => 'PRDGRP',
        'product_group_id' => null,
        'title' => null,
        'parent' => null,
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
