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
 * @property $batch_number
 * @property $value
 * @property $batch_description
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
        'batch_number' => null,
        'value' => null,
        'batch_description' => null,
        'product_description' => null,
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
