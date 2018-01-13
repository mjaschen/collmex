<?php

namespace MarcusJaschen\Collmex\Type;

class Revenue extends AbstractType implements TypeInterface
{
    const INVOICE_TYPE_STANDARD     = 0;
    const INVOICE_TYPE_CREDIT_MEMO  = 1;
    const INVOICE_TYPE_DOWN_PAYMENT = 2;

    const CANCELATION_TYPE_NO_CANCELATION = null;
    const CANCELATION_TYPE_CANCELATION    = 1;

    const REVENUE_TYPE_EXPORT                   = 10;
    const REVENUE_TYPE_INNER_COMMUNITY          = 11;
    const REVENUE_TYPE_NO_TAX_EU                = 12;
    const REVENUE_TYPE_NO_TAX                   = 13;
    const REVENUE_TYPE_TAX                      = 14;
    const REVENUE_TYPE_NO_TAX_3RD_PARTY_COUNTRY = 15;

    /**
     * @var array
     */
    protected $template = [
        'type_identifier'                => 'CMXUMS',
        'customer_id'                    => null,
        'client_id'                      => null,
        'invoice_date'                   => null,
        'invoice_id'                     => null, // 5
        'amount_netto_with_default_tax'  => null,
        'amount_default_tax'             => null,
        'amount_netto_with_reduced_tax'  => null,
        'amount_reduced_tax'             => null,
        'amount_inner_community_revenue' => null, // 10
        'amount_export'                  => null,
        'account_taxfree_revenue'        => null,
        'amount_taxfree_revenue'         => null,
        'currency'                       => null,
        'contra_account'                 => null, // 15
        'invoice_type'                   => null,
        'receipt_text'                   => null,
        'terms_of_payment'               => null,
        'account_default_tax'            => null,
        'account_reduced_tax'            => null, // 20
        'reserved_1'                     => null,
        'reserved_2'                     => null,
        'cancelation'                    => null,
        'closing_invoice'                => null,
        'revenue_type'                   => null, // 25
        'system_name'                    => null,
        'compensation_invoice_id'        => null,
        'cost_center'                    => null, // 28
    ];

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
