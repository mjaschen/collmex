<?php
namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Invoice Type
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     https://github.com/mjaschen/collmex
 *
 * @property $type_identifier
 * @property $invoice_id
 * @property $position
 * @property $invoice_type
 * @property $client_id
 * @property $order_id
 * @property $customer_id
 * @property $customer_salutation
 * @property $customer_title
 * @property $customer_forename
 * @property $customer_lastname
 * @property $customer_firm
 * @property $customer_department
 * @property $customer_street
 * @property $customer_zipcode
 * @property $customer_city
 * @property $customer_country
 * @property $customer_phone
 * @property $customer_phone_2
 * @property $customer_fax
 * @property $customer_email
 * @property $customer_bank_account
 * @property $customer_bank_code
 * @property $customer_bank_account_owner
 * @property $customer_bank_iban
 * @property $customer_bank_bic
 * @property $customer_bank_name
 * @property $customer_vat_id
 * @property $reserved
 * @property $invoice_date
 * @property $price_date
 * @property $terms_of_payment
 * @property $currency
 * @property $price_group
 * @property $discount_id
 * @property $discount_final
 * @property $discount_reason
 * @property $invoice_text
 * @property $final_text
 * @property $annotation
 * @property $deleted
 * @property $language
 * @property $employee_id
 * @property $agent_id
 * @property $system_name
 * @property $status
 * @property $discount_final_2
 * @property $discount_final_2_reason
 * @property $shipping_id
 * @property $shipping_costs
 * @property $cod_costs
 * @property $time_of_delivery
 * @property $delivery_conditions
 * @property $delivery_conditions_additional
 * @property $delivery_salutation
 * @property $delivery_title
 * @property $delivery_forename
 * @property $delivery_lastname
 * @property $delivery_firm
 * @property $delivery_department
 * @property $delivery_street
 * @property $delivery_zipcode
 * @property $delivery_city
 * @property $delivery_country
 * @property $delivery_phone
 * @property $delivery_phone_2
 * @property $delivery_fax
 * @property $delivery_email
 * @property $position_type
 * @property $product_id
 * @property $product_description
 * @property $quantity_unit
 * @property $quantity
 * @property $price
 * @property $price_quantity
 * @property $position_discount
 * @property $position_value
 * @property $product_type
 * @property $tax_rate
 * @property $foreign_tax
 * @property $customer_order_position
 * @property $revenue_type
 * @property $sum_over_positions
 * @property $revenue
 * @property $costs
 * @property $gross_profit
 * @property $margin
 * @property $costs_manually
 * @property $ean
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
    protected $template = [
        'type_identifier'                => 'CMXINV',
        'invoice_id'                     => null,
        'position'                       => null,
        'invoice_type'                   => null,
        'client_id'                      => null, // 5
        'order_id'                       => null,
        'customer_id'                    => null,
        'customer_salutation'            => null,
        'customer_title'                 => null,
        'customer_forename'              => null, // 10
        'customer_lastname'              => null,
        'customer_firm'                  => null,
        'customer_department'            => null,
        'customer_street'                => null,
        'customer_zipcode'               => null, // 15
        'customer_city'                  => null,
        'customer_country'               => null,
        'customer_phone'                 => null,
        'customer_phone_2'               => null,
        'customer_fax'                   => null, // 20
        'customer_email'                 => null,
        'customer_bank_account'          => null,
        'customer_bank_code'             => null,
        'customer_bank_account_owner'    => null,
        'customer_bank_iban'             => null, // 25
        'customer_bank_bic'              => null,
        'customer_bank_name'             => null,
        'customer_vat_id'                => null,
        'reserved'                       => null,
        'invoice_date'                   => null, // 30
        'price_date'                     => null,
        'terms_of_payment'               => null,
        'currency'                       => null,
        'price_group'                    => null,
        'discount_id'                    => null, // 35
        'discount_final'                 => null,
        'discount_reason'                => null,
        'invoice_text'                   => null,
        'final_text'                     => null,
        'annotation'                     => null, // 40
        'deleted'                        => null,
        'language'                       => null,
        'employee_id'                    => null,
        'agent_id'                       => null,
        'system_name'                    => null, // 45
        'status'                         => null,
        'discount_final_2'               => null,
        'discount_final_2_reason'        => null,
        'shipping_id'                    => null,
        'shipping_costs'                 => null, // 50
        'cod_costs'                      => null,
        'time_of_delivery'               => null,
        'delivery_conditions'            => null,
        'delivery_conditions_additional' => null,
        'delivery_salutation'            => null, // 55
        'delivery_title'                 => null,
        'delivery_forename'              => null,
        'delivery_lastname'              => null,
        'delivery_firm'                  => null,
        'delivery_department'            => null, // 60
        'delivery_street'                => null,
        'delivery_zipcode'               => null,
        'delivery_city'                  => null,
        'delivery_country'               => null,
        'delivery_phone'                 => null, // 65
        'delivery_phone_2'               => null,
        'delivery_fax'                   => null,
        'delivery_email'                 => null,
        'position_type'                  => null,
        'product_id'                     => null, // 70
        'product_description'            => null,
        'quantity_unit'                  => null,
        'quantity'                       => null,
        'price'                          => null,
        'price_quantity'                 => null, // 75
        'position_discount'              => null,
        'position_value'                 => null,
        'product_type'                   => null,
        'tax_rate'                       => null,
        'foreign_tax'                    => null, // 80
        'customer_order_position'        => null,
        'revenue_type'                   => null,
        'sum_over_positions'             => null,
        'revenue'                        => null,
        'costs'                          => null, // 85
        'gross_profit'                   => null,
        'margin'                         => null,
        'costs_manually'                 => null,
        'ean'                            => null, // 89
    ];

    /**
     * Formally validates the type data in $data attribute.
     *
     * @return bool Validation success
     */
    public function validate()
    {
        return true;
    }
}
