<?php
declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Payment Confirmation Type
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @author   René Galle <renegalle.webdevelopment@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     https://github.com/mjaschen/collmex
 *
 * @property $type_identifier
 * @property $order_id
 * @property $date_of_payment
 * @property $amount
 * @property $fee
 * @property $currency
 * @property $paypal_email
 * @property $paypal_transactionnumber
 * @property $cost_center
 */
class PaymentConfirmation extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'PAYMENT_CONFIRMATION',
        'order_id' => null,
        'date_of_payment' => null,
        'amount' => null,
        'fee' => null,
        'currency' => null,
        'paypal_email' => null,
        'paypal_transactionnumber' => null,
        'cost_center' => null,
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
