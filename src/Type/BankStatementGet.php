<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Bank Statement Get Type.
 *
 * @author   pluempyx <github@lukaspluemper.de>
 *
 * @property mixed $type_identifier
 * @property mixed $client_id
 * @property mixed $invoice_id
 * @property mixed $new_payments_only
 * @property mixed $system_name
 */
class BankStatementGet extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'BANK_STATEMENT_GET_FROM_BANK',
        'client_id' => null,
        'iban' => null,
        'pin' => null,
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
