<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 *
 * @property string $type_identifier
 * @property string $client_id
 * @property string $business_year
 * @property string $entry_id
 * @property string $document_date
 * @property string $booked_on
 * @property string $entry_description
 * @property string $position
 * @property string $account_id
 * @property string $account_name
 * @property string $debit_or_credit
 * @property string $amount
 * @property string $customer_id
 * @property string $customer_name
 * @property string $supplier_id
 * @property string $supplier_name
 * @property string $equipment_id
 * @property string $equipment_name
 * @property string $canceled_entry_id
 * @property string $cost_centre
 * @property string $invoice_id
 * @property string $order_id
 * @property string $travel_id
 * @property string $assigned_id
 * @property string $assigned_business_year
 * @property string $assigned_position
 * @property string $document_id
 * @property string $receipt_date
 * @property string $entry_date
 * @property string $internal_memo
 */
class AccountDocument extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'ACCDOC',
        'client_id' => null,
        'business_year' => null,
        'entry_id' => null,
        // 5
        'document_date' => null,
        'booked_on' => null,
        'entry_description' => null,
        'position' => null,
        'account_id' => null,
        // 10
        'account_name' => null,
        'debit_or_credit' => null,
        'amount' => null,
        'customer_id' => null,
        'customer_name' => null,
        // 15
        'supplier_id' => null,
        'supplier_name' => null,
        'equipment_id' => null,
        'equipment_name' => null,
        'canceled_entry_id' => null,
        // 20
        'cost_centre' => null,
        'invoice_id' => null,
        'order_id' => null,
        'travel_id' => null,
        'assigned_id' => null,
        // 25
        'assigned_business_year' => null,
        'assigned_position' => null,
        'document_id' => null,
        'receipt_date' => null,
        'entry_date' => null,
        // 30
        'internal_memo' => null,
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
