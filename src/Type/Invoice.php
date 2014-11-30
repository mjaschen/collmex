<?php
/**
 * Collmex Invoice Type
 *
 * PHP version 5.3
 *
 * @category  Collmex
 * @package   Type
 * @author    Marcus Jaschen <mail@marcusjaschen.de>
 * @copyright 2013 Marcus Jaschen
 * @license   http://www.opensource.org/licenses/mit-license MIT License
 * @link      http://github.com/mjaschen/collmex
 */

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Invoice Type
 *
 * @category Collmex
 * @package  Type
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     http://github.com/mjaschen/collmex
 */
class Invoice extends AbstractType implements TypeInterface
{
    const INVOICE_TYPE_INVOICE            = 0;
    const INVOICE_TYPE_CREDIT_MEMO        = 1;
    const INVOICE_TYPE_DOWN_PAYMENT       = 2;
    const INVOICE_TYPE_CASH_SALE          = 3;
    const INVOICE_TYPE_CREDIT_FOR_RETURNS = 4;
    const INVOICE_TYPE_PRO_FORMA_INVOICE  = 5;

    const NOT_DELETED = 0;
    const DELETED     = 1;

    const LANGUAGE_GERMAN  = 0;
    const LANGUAGE_ENGLISH = 1;

    const STATUS_NEW      = 0;
    const STATUS_TO_BOOK  = 10;
    const STATUS_OPEN     = 20;
    const STATUS_REMINDED = 30;
    const STATUS_DONE     = 40;
    const STATUS_DELETED  = 100;

    const POSITION_NORMAL = 0;
    const POSITION_SUM    = 1;
    const POSITION_TEXT   = 2;
    const POSITION_FREE   = 3;

    const TAX_RATE_FULL    = 0;
    const TAX_RATE_REDUCED = 1;
    const TAX_RATE_TAXFREE = 2;

    /**
     * Type data template
     *
     * @var array
     */
    protected $template = array(
        'type_identifier'                => 'CMXINV',
        'invoice_id'                     => null,
        'position'                       => null,
        'invoice_type'                   => null,
        'client_id'                      => null,
        'order_id'                       => null,
        'customer_id'                    => null,
        'customer_salutation'            => null,
        'customer_title'                 => null,
        'customer_forename'              => null,
        'customer_lastname'              => null,
        'customer_firm'                  => null,
        'customer_department'            => null,
        'customer_street'                => null,
        'customer_zipcode'               => null,
        'customer_city'                  => null,
        'customer_country'               => null,
        'customer_phone'                 => null,
        'customer_phone_2'               => null,
        'customer_fax'                   => null,
        'customer_email'                 => null,
        'customer_bank_account'          => null,
        'customer_bank_code'             => null,
        'customer_bank_account_owner'    => null,
        'customer_bank_iban'             => null,
        'customer_bank_bic'              => null,
        'customer_bank_name'             => null,
        'customer_vat_id'                => null,
        'reserved'                       => null,
        'invoice_date'                   => null,
        'price_date'                     => null,
        'terms_of_payment'               => null,
        'currency'                       => null,
        'price_group'                    => null,
        'discount_id'                    => null,
        'discount_final'                 => null,
        'discount_reason'                => null,
        'invoice_text'                   => null,
        'final_text'                     => null,
        'annotation'                     => null,
        'deleted'                        => null,
        'language'                       => null,
        'employee_id'                    => null,
        'agent_id'                       => null,
        'system_name'                    => null,
        'status'                         => null,
        'discount_final_2'               => null,
        'discount_final_2_reason'        => null,
        'shipping_id'                    => null,
        'shipping_costs'                 => null,
        'cod_costs'                      => null,
        'time_of_delivery'               => null,
        'delivery_conditions'            => null,
        'delivery_conditions_additional' => null,
        'delivery_salutation'            => null,
        'delivery_title'                 => null,
        'delivery_forename'              => null,
        'delivery_lastname'              => null,
        'delivery_firm'                  => null,
        'delivery_department'            => null,
        'delivery_street'                => null,
        'delivery_zipcode'               => null,
        'delivery_city'                  => null,
        'delivery_country'               => null,
        'delivery_phone'                 => null,
        'delivery_phone_2'               => null,
        'delivery_fax'                   => null,
        'delivery_email'                 => null,
        'position_type'                  => null,
        'product_id'                     => null,
        'product_description'            => null,
        'quantity_unit'                  => null,
        'quantity'                       => null,
        'price'                          => null,
        'price_quantity'                 => null,
        'position_discount'              => null,
        'position_value'                 => null,
        'product_type'                   => null,
        'tax_rate'                       => null,
        'foreign_tax'                    => null,
        'customer_order_position'        => null,
        'revenue_type'                   => null,
        'sum_over_positions'             => null,
        'revenue'                        => null,
        'costs'                          => null,
        'gross_profit'                   => null,
        'margin'                         => null,
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
