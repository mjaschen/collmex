<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * @property string $type_identifier
 * @property $terms_of_payment_id
 * @property string $description
 * @property $terms_of_payment
 * @property $inactive
 * @property $payment_period_first
 * @property $payment_period_first_discount
 * @property $payment_period_second
 * @property $payment_period_second_discount
 * @property $payment_period_third
 */
class TermsOfPayment extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'CMXTOP',
        'terms_of_payment_id' => null,
        'description' => null,
        'terms_of_payment' => null,
        // 5
        'inactive' => null,
        'payment_period_first' => null,
        'payment_period_first_discount' => null,
        'payment_period_second' => null,
        'payment_period_second_discount' => null,
        // 10
        'payment_period_third' => null,
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
