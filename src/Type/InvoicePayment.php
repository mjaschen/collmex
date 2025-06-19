<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Invoice Payment Type.
 *
 * @author   pluempyx <github@lukaspluemper.de>
 *
 * @property mixed $type_identifier
 * @property mixed $invoice_id
 * @property mixed $date
 * @property mixed $amount_paid
 * @property mixed $amount_reduced
 * @property mixed $business_year
 * @property mixed $entry_id
 * @property mixed $entry_pos
 * @property mixed $system_name
 */
class InvoicePayment extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'INVOICE_PAYMENT',
        'invoice_id' => null,
        'date' => null,
        'amount_paid' => null,
        'amount_reduced' => null,
        'business_year' => null,
        'entry_id' => null,
        'entry_pos' => null,
        'system_name' => null,
    ];

    /**
     * Formally validates the type data in $data attribute.
     *
     * @return bool Validation success
     */
    #[\Override]
    public function validate(): bool
    {
        return true;
    }
}
