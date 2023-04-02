<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * @property string $type_identifier
 */
class TermsOfPaymentGet extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'TERMS_OF_PAYMENT_GET',
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
