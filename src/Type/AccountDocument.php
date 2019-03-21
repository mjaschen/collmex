<?php
declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     https://github.com/mjaschen/collmex
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
        'document_date' => null, // 5
        'booked_on' => null,
        'entry_description' => null,
        'position' => null,
        'account_id' => null,
        'account_name' => null, // 10
        'debit_or_credit' => null,
        'amount' => null,
        'customer_id' => null,
        'customer_name' => null,
        'supplier_id' => null, // 15
        'supplier_name' => null,
        'equipment_id' => null,
        'equipment_name' => null,
        'canceled_entry_id' => null,
        'cost_centre' => null, // 20
        'invoice_id' => null,
        'order_id' => null,
        'travel_id' => null,
        'assigned_id' => null,
        'assigned_business_year' => null, // 25
        'assigned_position' => null,
        'document_id' => null,
        'receipt_date' => null,
        'entry_date' => null,
        'internal_memo' => null, // 30
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
