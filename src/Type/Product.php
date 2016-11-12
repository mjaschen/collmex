<?php
/**
 * Collmex Product Type
 *
 * @author    Jewel Ahmed <tojibon@gmail.com>
 * @license   http://www.opensource.org/licenses/mit-license MIT License
 * @link      https://github.com/mjaschen/collmex
 */

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Product Type
 *
 * @author   Jewel Ahmed <tojibon@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     https://github.com/mjaschen/collmex
 */
class Product extends AbstractType implements TypeInterface
{
    const TAX_CLASSIFICATION_FULL 	= 0;
    const TAX_CLASSIFICATION_HALF 	= 1;
    const TAX_CLASSIFICATION_NO 		= 2;
    
    const EK_TAX_CLASSIFICATION_FULL 	= 0;
    const EK_TAX_CLASSIFICATION_HALF 	= 1;
    const EK_TAX_CLASSIFICATION_NO 		= 2;
    
    const PRODUCT_TYPE_GOODS 				= 0;
    const PRODUCT_TYPE_SERVICE 			= 1;
    const PRODUCT_TYPE_MEMBERSHIP_FEE 	= 2;
    const PRODUCT_TYPE_CONSTRUCTION 	= 3;
    const PRODUCT_TYPE_WARE 				= 4;
    
    const INACTIVE_PRODUCT_IS_ACTIVE 					= 0;
    const INACTIVE_PRODUCT_IS_INACTIVE_OR_DELETE 	= 1;
    const INACTIVE_PRODUCT_DELETE 						= 2;
    const INACTIVE_PRODUCT_UNCHANGED 					= 3;
    
    const CHARGENPFLICHT = 0;
    
    const TEXT_ARE_HTML = 0;
    
    const PROCUREMENT_SHOPPING    = 0;
    const PROCUREMENT_PRODUCTION  = 10;
    
    const LABOR_COSTS_REFERENCE_AMOUNT  = 1;
    
    const COSTING_AUTOMATIC   = 0;
    const COSTING_MANUAL      = 0;
    
    const BASIC_UNIT_No      			= 0;
    const BASIC_UNIT_KILOGRAM      	= 1;
    const BASIC_UNIT_L      			= 2;
    const BASIC_UNIT_CUBIC_METERS	= 3;
    const BASIC_UNIT_METERS      	= 4;
    const BASIC_UNIT_SQUARE      	= 5;
    const BASIC_UNIT_PIECE      		= 5;

    /**
     * Type data template
     *
     * @var array
     */
    protected $template = array(
        'type_identifier'                => 'CMXPRD',
        'product_id'                      => null,
        'designation'                      => null,
        'name_eng'                      => null,
        'iso_code'                      => null,
        'product_group'                      => null,
        'client_id'                      => null,
        'tax_classification'                      => null,
        'weight'                      => null,
        'weight_unit'                      => null,
        'price_quantity'                      => null,
        'product_type'                      => null,
        'inactive'                      => null,
        'price_group'                      => null,
        'sale_price'                      => null,
        'ean'                      => null,
        'manufacturer'                      => null,
        'shipping_group'                      => null,
        'minimum_holding'                      => null,
        'quantity'                      => null,
        'chargenpflicht'                      => null,
        'procurement'                      => null,
        'production_time'                      => null,
        'labor_costs'                      => null,
        'labor_costs_reference_amount'                      => null,
        'remark'                      => null,
        'costing'                      => null,
        'costs'                      => null,
        'reference_amount_cost'                      => null,
        'ek_supplier'                      => null,
        'ek_tax_classification'                      => null,
        'product_number_of_the_supplier'                      => null,
        'ek_package'                      => null,
        'ek_designation'                      => null,
        'one_press'                      => null,
        'purchase_price_amount'                      => null,
        'ek_delivery'                      => null,
        'ek_currency'                      => null,
        'reserved'                      => null,
        'reserved1'                      => null,
        'website_number'                      => null,
        'shop_short_text'                      => null,
        'shop_long_text'                      => null,
        'text_are_html'                      => null,
        'filename'                      => null,
        'keywords'                      => null,
        'title'                      => null,
        'deviant_template_no'                      => null,
        'image_url'                      => null,
        'base_price_volume1'                      => null,
        'base_price_volume2'                      => null,
        'basic_unit'                      => null,
        'price_on_request'                      => null,
        'inactive1'                      => null,
        'shop_categories'                      => null,
        'reserved2'                      => null,
        'reserved3'                      => null,
        'reserved4'                      => null,
        'productnr_manufacturer'                      => null,
        'delivery_relevant'                      => null,
        'amazon_asin'                      => null,
        'ebay_item_number'                      => null,
        'direct_delivery'                      => null,
        'lot_number'                      => null
    );

    /**
     * Formally validates the type data in $data attribute.
     *
     * @return bool Validation success
     */
    public function validate()
    {
        // TODO: Implement validate() method.
    }
}
