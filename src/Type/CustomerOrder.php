<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Class CustomerOrder.
 *
 * @author  Marcus Jaschen <mjaschen@gmail.com>
 *
 * @property $type_identifier
 * @property $order_id
 * @property $position
 * @property $order_type
 * @property $client_id
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
 * @property $customer_order_id
 * @property $order_date
 * @property $price_date
 * @property $terms_of_payment
 * @property $currency
 * @property $price_group
 * @property $discount_id
 * @property $discount_final
 * @property $discount_reason
 * @property $confirmation_text
 * @property $final_text
 * @property $internal_memo
 * @property $partial_invoices
 * @property $partial_shipping
 * @property $deleted
 * @property $status
 * @property $language
 * @property $employee_id
 * @property $agent_id
 * @property $system_name
 * @property $discount_final_2
 * @property $discount_final_2_reason
 * @property $reserved_2
 * @property $canceled_at
 * @property $shipping_type
 * @property $shipping_costs
 * @property $cod_costs
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
 * @property $delivery_date
 * @property $price_quantity
 * @property $position_discount
 * @property $position_value
 * @property $product_type
 * @property $tax_rate
 * @property $foreign_tax
 * @property $revenue_type
 * @property $shipped_final
 * @property $billed_final
 * @property $revenue
 * @property $costs
 * @property $gross_profit
 * @property $margin
 */
class CustomerOrder extends AbstractType implements TypeInterface
{
    /**
     * @var int
     */
    public const PARTIAL_INVOICES_ALLOWED = 1;
    /**
     * @var int
     */
    public const PARTIAL_INVOICES_NOT_ALLOWED = 0;

    /**
     * @var int
     */
    public const PARTIAL_SHIPPING_ALLOWED = 1;
    /**
     * @var int
     */
    public const PARTIAL_SHIPPING_NOT_ALLOWED = 0;

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
    public const STATUS_NEW = 0;
    /**
     * @var int
     */
    public const STATUS_CONFIRMED = 10;
    /**
     * @var int
     */
    public const STATUS_PARTIALLY_PAYED = 20;
    /**
     * @var int
     */
    public const STATUS_PAYMENT_CONFIRMED = 25;
    /**
     * @var int
     */
    public const STATUS_PAYED = 30;
    /**
     * @var int
     */
    public const STATUS_PARTIALLY_SHIPPED = 40;
    /**
     * @var int
     */
    public const STATUS_SHIPPED = 50;
    /**
     * @var int
     */
    public const STATUS_PARTIAL_DISCOUNT = 60;
    /**
     * @var int
     */
    public const STATUS_DISCOUNT = 70;
    /**
     * @var int
     */
    public const STATUS_PARTIALLY_BILLED = 80;
    /**
     * @var int
     */
    public const STATUS_BILLED = 90;
    /**
     * @var int
     */
    public const STATUS_DONE = 100;
    /**
     * @var int
     */
    public const STATUS_CANCELED = 1000;
    /**
     * @var int
     */
    public const STATUS_DELETED = 1010;

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
     * @var array
     */
    protected $template = [
        'type_identifier' => 'CMXORD-2',
        'order_id' => null,
        'position' => null,
        'order_type' => null,
        'client_id' => null,
        'customer_id' => null,
        'customer_salutation' => null,
        'customer_title' => null,
        'customer_forename' => null,
        // 10
        'customer_lastname' => null,
        'customer_firm' => null,
        'customer_department' => null,
        'customer_street' => null,
        'customer_zipcode' => null,
        'customer_city' => null,
        'customer_country' => null,
        'customer_phone' => null,
        'customer_phone_2' => null,
        'customer_fax' => null,
        // 20
        'customer_email' => null,
        'customer_bank_account' => null,
        'customer_bank_code' => null,
        'customer_bank_account_owner' => null,
        'customer_bank_iban' => null,
        'customer_bank_bic' => null,
        'customer_bank_name' => null,
        'customer_vat_id' => null,
        'reserved' => null,
        'customer_order_id' => null,
        // 30
        'order_date' => null,
        'price_date' => null,
        'terms_of_payment' => null,
        'currency' => null,
        'price_group' => null,
        'discount_id' => null,
        'discount_final' => null,
        'discount_reason' => null,
        'confirmation_text' => null,
        'final_text' => null,
        // 40
        'internal_memo' => null,
        'partial_invoices' => null,
        'partial_shipping' => null,
        'deleted' => null,
        'status' => null,
        'language' => null,
        'employee_id' => null,
        'agent_id' => null,
        'system_name' => null,
        'discount_final_2' => null,
        // 50
        'discount_final_2_reason' => null,
        'reserved_2' => null,
        'canceled_at' => null,
        'shipping_type' => null,
        'shipping_costs' => null,
        'cod_costs' => null,
        'delivery_conditions' => null,
        'delivery_conditions_additional' => null,
        'delivery_salutation' => null,
        'delivery_title' => null,
        // 60
        'delivery_forename' => null,
        'delivery_lastname' => null,
        'delivery_firm' => null,
        'delivery_department' => null,
        'delivery_street' => null,
        'delivery_zipcode' => null,
        'delivery_city' => null,
        'delivery_country' => null,
        'delivery_phone' => null,
        'delivery_phone_2' => null,
        // 70
        'delivery_fax' => null,
        'delivery_email' => null,
        'position_type' => null,
        'product_id' => null,
        'product_description' => null,
        'quantity_unit' => null,
        'quantity' => null,
        'price' => null,
        'delivery_date' => null,
        'price_quantity' => null,
        // 80
        'position_discount' => null,
        'position_value' => null,
        'product_type' => null,
        'tax_rate' => null,
        'foreign_tax' => null,
        'revenue_type' => null,
        'shipped_final' => null,
        'billed_final' => null,
        'revenue' => null,
        'costs' => null,
        // 90
        'gross_profit' => null,
        'margin' => null,
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
