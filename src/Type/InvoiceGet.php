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
 * @property mixed $order_id
 * @property mixed $product_id
 */
class InvoiceGet extends AbstractType implements TypeInterface
{
    /**
     * @var int
     */
    final public const FORMAT_CSV = 0;
    /**
     * @var int
     */
    final public const FORMAT_ZIP = 1;
    /**
     * @var int
     */
    final public const FORMAT_ZIP_XML_ONLY = 2;
    /**
     * @var int
     */
    final public const FORMAT_ZIP_XML_AND_PDF = 3;

    /**
     * @var int
     */
    final public const STATIONARY_INCLUDE = 0;
    /**
     * @var int
     */
    final public const STATIONARY_EXCLUDE = 1;

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
        'order_id' => null,
        'product_id' => null,
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
