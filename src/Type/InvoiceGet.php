<?php
/**
 * Collmex Invoice Get Type
 *
 * @author    Marcus Jaschen <mail@marcusjaschen.de>
 * @license   http://www.opensource.org/licenses/mit-license MIT License
 * @link      https://github.com/mjaschen/collmex
 */

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Invoice Get Type
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     https://github.com/mjaschen/collmex
 *
 * @property $type_identifier
 * @property $invoice_id
 * @property $client_id
 * @property $customer_id
 * @property $invoice_date_from
 * @property $invoice_date_to
 * @property $sent_only
 * @property $format
 * @property $changed_only
 * @property $system_name
 * @property $created_by_system_only
 * @property $stationary_exclude
 */
class InvoiceGet extends AbstractType implements TypeInterface
{
    const FORMAT_CSV = 0;
    const FORMAT_ZIP = 1;

    const STATIONARY_INCLUDE = 0;
    const STATIONARY_EXCLUDE = 1;

    /**
     * @var array
     */
    protected $template = [
        'type_identifier'        => 'INVOICE_GET',
        'invoice_id'             => null,
        'client_id'              => null,
        'customer_id'            => null,
        'invoice_date_from'      => null,
        'invoice_date_to'        => null,
        'sent_only'              => null,
        'format'                 => null,
        'changed_only'           => null,
        'system_name'            => null,
        'created_by_system_only' => null,
        'stationary_exclude'     => null,
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
