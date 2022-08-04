<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

class SupplierInvoice implements TypeInterface
{
    /**
     * @var null
     */
    public const CANCELATION_TYPE_NO_CANCELATION = null;
    /**
     * @var int
     */
    public const CANCELATION_TYPE_CANCELATION = 1;

    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'CMXLRN',
        'supplier_id' => null,
        'client_id' => null,
        'invoice_date' => null,
        // 5
        'invoice_id' => null,
        'amount_netto_with_default_tax' => null,
        'amount_default_tax' => null,
        'amount_netto_with_reduced_tax' => null,
        'amount_reduced_tax' => null,
        // 10
        'revenue_misc_account' => null,
        'revenue_misc_amount' => null,
        'currency' => null,
        'contra_account' => null,
        'credit_memo' => null,
        // 15
        'receipt_text' => null,
        'terms_of_payment' => null,
        'account_default_tax' => null,
        'account_reduced_tax' => null,
        'cancelation' => null,
        // 20
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
