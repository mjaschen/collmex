<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Customer Agreement Type (CMXCAG).
 *
 * @see https://www.collmex.de/c.cmx?1005,1,help,daten_importieren_kundenvereinbarung
 *
 * @property string $type_identifier
 * @property numeric $client_id
 * @property numeric $customer_id
 * @property string $product_id
 * @property numeric $position
 * @property string|int $valid_from
 * @property string|int $valid_to
 * @property string|int $price
 * @property string $currency
 * @property numeric $deleted
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
