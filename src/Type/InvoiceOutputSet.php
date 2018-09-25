<?php
namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Invoice Get Type
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     https://github.com/mjaschen/collmex
 *
 * @property string $type_identifier
 * @property string $invoice_id
 * @property int $output_medium
 */
class InvoiceOutputSet extends AbstractType implements TypeInterface
{
    const OUTPUT_MEDIUM_PRINT        = 0;
    const OUTPUT_MEDIUM_EMAIL        = 1;
    const OUTPUT_MEDIUM_FAX          = 2;
    const OUTPUT_MEDIUM_MAIL         = 3;
    const OUTPUT_MEDIUM_EMAIL_SIGNED = 4;
    const OUTPUT_MEDIUM_NO_OUTPUT    = 100;

    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'INVOICE_OUTPUT_SET',
        'invoice_id'      => null,
        'output_medium'   => null,
    ];

    /**
     * Formally validates the type data in $data attribute.
     *
     * @return bool Validation success
     */
    public function validate()
    {
        return true;
    }
}
