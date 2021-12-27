<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Invoice Payment Get Type.
 *
 * @author   pluempyx <github@lukaspluemper.de>
 *
 * @property mixed $type_identifier
 * @property mixed $client_id
 * @property mixed $invoice_id
 * @property mixed $new_payments_only
 * @property mixed $system_name
 */
class InvoicePaymentGet extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'INVOICE_PAYMENT_GET',
        'client_id' => null,
        'invoice_id' => null,
        'new_payments_only' => null,
        'system_name' => null,
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
