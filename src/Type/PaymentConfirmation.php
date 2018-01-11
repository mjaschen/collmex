<?php
/**
 * Collmex Payment Confirmation Type
 *
 * @author    Marcus Jaschen <mail@marcusjaschen.de>
 * @author    René Galle <renegalle.webdevelopment@gmail.com>
 * @license   http://www.opensource.org/licenses/mit-license MIT License
 * @link      https://github.com/mjaschen/collmex
 */

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Payment Confirmation Type
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @author   René Galle <renegalle.webdevelopment@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     https://github.com/mjaschen/collmex
 */
class PaymentConfirmation extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier'          => 'PAYMENT_CONFIRMATION',
        'order_id'                 => null,
        'date_of_payment'          => null,
        'amount'                   => null,
        'fee'                      => null,
        'currency'                 => null,
        'paypal_email'             => null,
        'paypal_transactionnumber' => null,
        'cost_center'              => null,
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
