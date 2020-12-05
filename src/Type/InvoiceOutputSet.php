<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Invoice Get Type.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 *
 * @property string $type_identifier
 * @property string $invoice_id
 * @property int $output_medium
 */
class InvoiceOutputSet extends AbstractType implements TypeInterface
{
    /**
     * @var int
     */
    public const OUTPUT_MEDIUM_PRINT = 0;
    /**
     * @var int
     */
    public const OUTPUT_MEDIUM_EMAIL = 1;
    /**
     * @var int
     */
    public const OUTPUT_MEDIUM_FAX = 2;
    /**
     * @var int
     */
    public const OUTPUT_MEDIUM_MAIL = 3;
    /**
     * @var int
     */
    public const OUTPUT_MEDIUM_EMAIL_SIGNED = 4;
    /**
     * @var int
     */
    public const OUTPUT_MEDIUM_NO_OUTPUT = 100;

    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'INVOICE_OUTPUT_SET',
        'invoice_id' => null,
        'output_medium' => null,
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
