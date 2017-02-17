<?php
/**
 * Collmex Customer Order Get Type
 *
 * @author    Jörg Wolfgram <joerg.wolfgram@spectrattack.de>
 * @license   http://www.opensource.org/licenses/mit-license MIT License
 * @link      https://github.com/mjaschen/collmex
 */

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Customer Order Get Type
 *
 * @author   Jörg Wolfgram <joerg.wolfgram@spectrattack.de>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     https://github.com/mjaschen/collmex
 */
class SalesOrderGet extends AbstractType implements TypeInterface
{
    const FORMAT_CSV = 0;
    const FORMAT_ZIP = 1;

    const FILTER_ON     = 1;    // useable for 'only_changed' and 'only_created_by_system'
    const FILTER_OFF    = 0;    // useable for 'only_changed' and 'only_created_by_system'

    const WITH_LETTER_PAPER = 0;
    const NO_LETTER_PAPER   = 1;

    /**
     * @var array
     */
    protected $template = array(
        'type_identifier'           => 'SALES_ORDER_GET',
        'order_id'                  => null,
        'client_id'                 => null,
        'customer_id'               => null,
        'order_date_start'          => null,
        'order_date_end'            => null,
        'customer_order_id'         => null,
        'format'                    => null,
        'only_changed'              => null,
        'system_name'               => null,    // 10
        'only_created_by_system'    => null,
        'letter_paper'              => null,
    );

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
