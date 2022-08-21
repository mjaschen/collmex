<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

class Quotation extends AbstractType implements TypeInterface
{
    protected $template = [
        'type_identifier' => 'CMXQTN',
        'quotation_id' => null,
        'position' => null,
        'quotation_type' => null,
        // 5
        'client_id' => null,
        'customer_id',
        'customer_salutation',
        'customer_title',
        'customer_firstname',
        // 10
        'customer_lastname',
        'customer_company',
        'customer_department',
        'customer_street',
        'customer_zipcode',
        // 15
        'customer_city',
        'customer_country',
        'customer_phone',
        'customer_phone_2',
        'customer_fax',
        // 20
        'customer_email',
        'customer_bank_account',
        'customer_bank_code',
        'customer_bank_account_owner',
        'customer_bank_iban',
        // 25
        'customer_bank_bic',
        'customer_bank_name',
        'customer_vat_id',
        'customer_private_person',
        'quotation_date',
        // 30
        'price_date',
        'terms_of_payment',
        'currency',
        'price_group',
        'discount_id',
        // 35
        'discount_final',
        'discount_reason',
        'confirmation_text',
        'final_text',
        'internal_memo',
        // 40
        'deleted',
        'declined_date',
        'language',
        'employee_id',
        'agent_id',
        // 45
        'discount_final_2',
        'discount_final_2_reason',
        'status',
        'quotation_limit_date',
        'shipping_type',
        // 50
        'shipping_costs',
        'cod_costs',
        'delivery_date',
        'delivery_conditions',
        'delivery_conditions_additional',
        // 55
        'delivery_salutation',
        'delivery_title',
        'delivery_firstname',
        'delivery_lastname',
        'delivery_company',
        // 60
        'delivery_department',
        'delivery_street',
        'delivery_zipcode',
        'delivery_city',
        'delivery_country',
        // 65
        'delivery_phone',
        'delivery_phone_2',
        'delivery_fax',
        'delivery_email',
        'position_type',
        // 70
        'product_id',
        'product_description',
        'quantity_unit',
        'quantity',
        'price',
        // 75
        'price_quantity',
        'position_discount',
        'position_value',
        'product_type',
        'tax_rate',
        // 80
        'foreign_tax',
        'revenue_type',
        'sum_over_positions',
        'revenue',
        'costs',
        // 85
        'gross_profit',
        'margin',
        'costs_manual',
    ];

    public function validate(): bool
    {
        return true;
    }
}
