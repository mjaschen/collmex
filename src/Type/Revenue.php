<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Class Revenue.
 *
 * @author  Marcus Jaschen <mjaschen@gmail.com>
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
    /**
     * @var int
     */
    public const INVOICE_TYPE_STANDARD = 0;
    /**
     * @var int
     */
    public const INVOICE_TYPE_CREDIT_MEMO = 1;
    /**
     * @var int
     */
    public const INVOICE_TYPE_DOWN_PAYMENT = 2;

    /**
     * @var null
     */
    public const CANCELATION_TYPE_NO_CANCELATION = null;
    /**
     * @var int
     */
    public const CANCELATION_TYPE_CANCELATION = 1;

    /**
     * @var int
     */
    public const REVENUE_TYPE_EXPORT = 10;
    /**
     * @var int
     */
    public const REVENUE_TYPE_INNER_COMMUNITY = 11;
    /**
     * @var int
     */
    public const REVENUE_TYPE_NO_TAX_EU = 12;
    /**
     * @var int
     */
    public const REVENUE_TYPE_NO_TAX = 13;
    /**
     * @var int
     */
    public const REVENUE_TYPE_TAX = 14;
    /**
     * @var int
     */
    public const REVENUE_TYPE_NO_TAX_3RD_PARTY_COUNTRY = 15;

    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'CMXUMS',
        'customer_id' => null,
        'client_id' => null,
        'invoice_date' => null,
        // 5
        'invoice_id' => null,
        'amount_netto_with_default_tax' => null,
        'amount_default_tax' => null,
        'amount_netto_with_reduced_tax' => null,
        'amount_reduced_tax' => null,
        // 10
        'amount_inner_community_revenue' => null,
        'amount_export' => null,
        'account_taxfree_revenue' => null,
        'amount_taxfree_revenue' => null,
        'currency' => null,
        // 15
        'contra_account' => null,
        'invoice_type' => null,
        'receipt_text' => null,
        'terms_of_payment' => null,
        'account_default_tax' => null,
        // 20
        'account_reduced_tax' => null,
        'reserved_1' => null,
        'reserved_2' => null,
        'cancelation' => null,
        'closing_invoice' => null,
        // 25
        'revenue_type' => null,
        'system_name' => null,
        'compensation_invoice_id' => null,
        // 28
        'cost_center' => null,
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
