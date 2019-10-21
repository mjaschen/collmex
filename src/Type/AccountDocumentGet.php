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
 * @property string $account_id
 * @property string $cost_center
 * @property string $customer_id
 * @property string $supplier_id
 * @property string $equipment_id
 * @property string $invoice_id
 * @property string $travel_id
 * @property string $text
 * @property string $receipt_date_from
 * @property string $receipt_date_to
 * @property string $include_canceled
 * @property string $only_changed
 * @property string $system_name
 */
class AccountDocumentGet extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'ACCDOC_GET',
        'client_id' => null,
        'business_year' => null,
        'entry_id' => null,
        // 5
        'account_id' => null,
        'cost_center' => null,
        'customer_id' => null,
        'supplier_id' => null,
        'equipment_id' => null,
        // 10
        'invoice_id' => null,
        'travel_id' => null,
        'text' => null,
        'receipt_date_from' => null,
        'receipt_date_to' => null,
        // 15
        'include_canceled' => null,
        'only_changed' => null,
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
