<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Invoice Type.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
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
    /**
     * @var int
     */
    public const INVOICE_TYPE_INVOICE = 0;
    /**
     * @var int
     */
    public const INVOICE_TYPE_CREDIT_MEMO = 1;
    /**
     * @var int
     */
    public const INVOICE_TYPE_DOWN_PAYMENT = 2;
    /**
     * @var int
     */
    public const INVOICE_TYPE_CASH_SALE = 3;
    /**
     * @var int
     */
    public const INVOICE_TYPE_CREDIT_FOR_RETURNS = 4;
    /**
     * @var int
     */
    public const INVOICE_TYPE_PRO_FORMA_INVOICE = 5;

    /**
     * @var int
     */
    public const NOT_DELETED = 0;
    /**
     * @var int
     */
    public const DELETED = 1;

    /**
     * @var int
     */
    public const LANGUAGE_GERMAN = 0;
    /**
     * @var int
     */
    public const LANGUAGE_ENGLISH = 1;

    /**
     * @var int
     */
    public const STATUS_NEW = 0;
    /**
     * @var int
     */
    public const STATUS_TO_BOOK = 10;
    /**
     * @var int
     */
    public const STATUS_OPEN = 20;
    /**
     * @var int
     */
    public const STATUS_REMINDED = 30;
    /**
     * @var int
     */
    public const STATUS_DONE = 40;
    /**
     * @var int
     */
    public const STATUS_DELETED = 100;

    /**
     * @var int
     */
    public const POSITION_NORMAL = 0;
    /**
     * @var int
     */
    public const POSITION_SUM = 1;
    /**
     * @var int
     */
    public const POSITION_TEXT = 2;
    /**
     * @var int
     */
    public const POSITION_FREE = 3;

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
     * Type data template.
     *
     * @var array
     */
    protected $template = [
        'type_identifier' => 'CMXINV',
        'invoice_id' => null,
        'position' => null,
        'invoice_type' => null,
        // 5
        'client_id' => null,
        'order_id' => null,
        'customer_id' => null,
        'customer_salutation' => null,
        'customer_title' => null,
        // 10
        'customer_forename' => null,
        'customer_lastname' => null,
        'customer_firm' => null,
        'customer_department' => null,
        'customer_street' => null,
        // 15
        'customer_zipcode' => null,
        'customer_city' => null,
        'customer_country' => null,
        'customer_phone' => null,
        'customer_phone_2' => null,
        // 20
        'customer_fax' => null,
        'customer_email' => null,
        'customer_bank_account' => null,
        'customer_bank_code' => null,
        'customer_bank_account_owner' => null,
        // 25
        'customer_bank_iban' => null,
        'customer_bank_bic' => null,
        'customer_bank_name' => null,
        'customer_vat_id' => null,
        'reserved' => null,
        // 30
        'invoice_date' => null,
        'price_date' => null,
        'terms_of_payment' => null,
        'currency' => null,
        'price_group' => null,
        // 35
        'discount_id' => null,
        'discount_final' => null,
        'discount_reason' => null,
        'invoice_text' => null,
        'final_text' => null,
        // 40
        'annotation' => null,
        'deleted' => null,
        'language' => null,
        'employee_id' => null,
        'agent_id' => null,
        // 45
        'system_name' => null,
        'status' => null,
        'discount_final_2' => null,
        'discount_final_2_reason' => null,
        'shipping_id' => null,
        // 50
        'shipping_costs' => null,
        'cod_costs' => null,
        'time_of_delivery' => null,
        'delivery_conditions' => null,
        'delivery_conditions_additional' => null,
        // 55
        'delivery_salutation' => null,
        'delivery_title' => null,
        'delivery_forename' => null,
        'delivery_lastname' => null,
        'delivery_firm' => null,
        // 60
        'delivery_department' => null,
        'delivery_street' => null,
        'delivery_zipcode' => null,
        'delivery_city' => null,
        'delivery_country' => null,
        // 65
        'delivery_phone' => null,
        'delivery_phone_2' => null,
        'delivery_fax' => null,
        'delivery_email' => null,
        'position_type' => null,
        // 70
        'product_id' => null,
        'product_description' => null,
        'quantity_unit' => null,
        'quantity' => null,
        'price' => null,
        // 75
        'price_quantity' => null,
        'position_discount' => null,
        'position_value' => null,
        'product_type' => null,
        'tax_rate' => null,
        // 80
        'foreign_tax' => null,
        'customer_order_position' => null,
        'revenue_type' => null,
        'sum_over_positions' => null,
        'revenue' => null,
        // 85
        'costs' => null,
        'gross_profit' => null,
        'margin' => null,
        'costs_manually' => null,
        // 89
        'ean' => null,
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
