<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Stock Type.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @author   René Galle <renegalle.webdevelopment@gmail.com>
 *
 * @property $type_identifier
 * @property $product_id
 * @property $client_id
 * @property $stock
 * @property $type
 * @property $charge_number
 * @property $value
 * @property $charge_description
 * @property $product_description
 */
class Stock extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'CMXSTK',
        'product_id' => null,
        'client_id' => null,
        'stock' => null,
        'type' => null,
        'charge_number' => null,
        'value' => null,
        'charge_description' => null,
        'product_description' => null,
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
