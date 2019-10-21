<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Invoice Get Type.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 *
 * @property mixed $type_identifier
 * @property mixed $invoice_id
 * @property mixed $client_id
 * @property mixed $customer_id
 * @property mixed $invoice_date_from
 * @property mixed $invoice_date_to
 * @property mixed $sent_only
 * @property mixed $format
 * @property mixed $changed_only
 * @property mixed $system_name
 * @property mixed $created_by_system_only
 * @property mixed $stationary_exclude
 * @property mixed $output_required
 */
class InvoiceGet extends AbstractType implements TypeInterface
{
    /**
     * @var int
     */
    public const FORMAT_CSV = 0;
    /**
     * @var int
     */
    public const FORMAT_ZIP = 1;

    /**
     * @var int
     */
    public const STATIONARY_INCLUDE = 0;
    /**
     * @var int
     */
    public const STATIONARY_EXCLUDE = 1;

    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'INVOICE_GET',
        'invoice_id' => null,
        'client_id' => null,
        'customer_id' => null,
        'invoice_date_from' => null,
        'invoice_date_to' => null,
        'sent_only' => null,
        'format' => null,
        'changed_only' => null,
        'system_name' => null,
        'created_by_system_only' => null,
        'stationary_exclude' => null,
        'output_required' => null,
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
