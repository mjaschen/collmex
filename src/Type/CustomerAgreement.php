<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Customer Agreement Type (CMXCAG).
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 *
 * @property $type_identifier
 * @property $client_id
 * @property $customer_id
 * @property $product_id
 * @property $position
 * @property $valid_from
 * @property $valid_to
 * @property $price
 * @property $currency
 * @property $deleted
 */
class CustomerAgreement extends AbstractType implements TypeInterface
{
    /**
     * Type data template.
     *
     * @var array
     */
    protected $template = [
        'type_identifier' => 'CMXCAG',
        'client_id' => null,
        'customer_id' => null,
        'product_id' => null,
        'position' => null,
        'valid_from' => null,
        'valid_to' => null,
        'price' => null,
        'currency' => null,
        'deleted' => null,
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
