<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Invoice Output Type.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 *
 * @property $type_identifier
 * @property $client_id
 * @property $invoice_id
 * @property $output_medium
 * @property $output_required
 * @property $customer_id
 * @property $invoice_date_begin
 * @property $invoice_date_end
 * @property $max_invoices_amount
 * @property $also_deleted
 * @property $dont_book
 */
class InvoiceOutput extends AbstractType implements TypeInterface
{
    /**
     * @var int
     */
    final public const OUTPUT_MEDIUM_PRINT = 0;

    /**
     * @var int
     */
    final public const OUTPUT_MEDIUM_EMAIL = 1;

    /**
     * @var int
     */
    final public const OUTPUT_MEDIUM_FAX = 2;

    /**
     * @var int
     */
    final public const OUTPUT_MEDIUM_MAIL = 3;

    /**
     * @var int
     */
    final public const OUTPUT_MEDIUM_EMAIL_SIGNED = 4;

    /**
     * @var int
     */
    final public const OUTPUT_MEDIUM_NO_OUTPUT = 100;

    /**
     * @var int
     */
    final public const ALSO_DELETED_NO_DELETED = 0;

    /**
     * @var int
     */
    final public const ALSO_DELETED_DELETED = 1;

    /**
     * @var int
     */
    final public const DONT_BOOK_BOOK = 0;

    /**
     * @var int
     */
    final public const DONT_BOOK_NO_BOOK = 1;

    /**
     * @var int
     */
    final public const OUTPUT_REQUIRED_REQUIRED = 1;

    /**
     * @var int
     */
    final public const OUTPUT_REQUIRED_NOT_REQUIRED = 0;

    /**
     * @var array
     */
    protected $template = [
        // 1
        'type_identifier' => 'INVOICE_OUTPUT',
        'client_id' => null,
        'invoice_id' => null,
        'output_medium' => null,
        // 5
        'output_required' => null,
        'customer_id' => null,
        'invoice_date_begin' => null,
        'invoice_date_end' => null,
        'max_invoices_amount' => null,
        // 10
        'also_deleted' => null,
        'dont_book' => null,
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
