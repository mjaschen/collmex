<?php

namespace MarcusJaschen\Collmex\Type;

/**
 * Class Revenue
 *
 * @author  Marcus Jaschen <mjaschen@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license MIT License
 * @link    https://github.com/mjaschen/collmex
 *
 * @property $type_identifier
 * @property $customer_id
 * @property $client_id
 * @property $invoice_date
 * @property $invoice_id
 * @property $amount_netto_with_default_tax
 * @property $amount_default_tax
 * @property $amount_netto_with_reduced_tax
 * @property $amount_reduced_tax
 * @property $amount_inner_community_revenue
 * @property $amount_export
 * @property $account_taxfree_revenue
 * @property $amount_taxfree_revenue
 * @property $currency
 * @property $contra_account
 * @property $invoice_type
 * @property $receipt_text
 * @property $terms_of_payment
 * @property $account_default_tax
 * @property $account_reduced_tax
 * @property $reserved_1
 * @property $reserved_2
 * @property $cancelation
 * @property $closing_invoice
 * @property $revenue_type
 * @property $system_name
 * @property $compensation_invoice_id
 * @property $cost_center
 */
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
