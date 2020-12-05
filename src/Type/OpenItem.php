<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex OpenItem Type.
 *
 * @author  Marcus Jaschen <mjaschen@gmail.com>
 * @author  René Galle <renegalle.webdevelopment@gmail.com>
 *
 * @property $type_identifier
 * @property $client_id
 * @property $business_year
 * @property $accounting_id
 * @property $position_number
 * @property $customer_id
 * @property $customer_name
 * @property $supplier_id
 * @property $supplier_name
 * @property $invoice_id
 * @property $receipt_date
 * @property $payment_conditions
 * @property $due_date
 * @property $delay
 * @property $dunning_level
 * @property $dunning_date
 * @property $dunning_charge
 * @property $amount
 * @property $payed
 * @property $open
 */
class OpenItem extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        // 1
        'type_identifier' => 'OPEN_ITEM',
        'client_id' => null,
        'business_year' => null,
        'accounting_id' => null,
        // 5
        'position_number' => null,
        'customer_id' => null,
        'customer_name' => null,
        'supplier_id' => null,
        'supplier_name' => null,
        // 10
        'invoice_id' => null,
        'receipt_date' => null,
        'payment_conditions' => null,
        'due_date' => null,
        'delay' => null,
        // 15
        'dunning_level' => null,
        'dunning_date' => null,
        'dunning_charge' => null,
        'amount' => null,
        'payed' => null,
        // 20
        'open' => null,
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
