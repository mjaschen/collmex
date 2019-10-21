<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Product Get Type.
 *
 * @author  Jewel Ahmed <tojibon@gmail.com>
 * @author  Marcus Jaschen <mjaschen@gmail.com>
 *
 * @property $type_identifier
 * @property $client_id
 * @property $product_id
 * @property $product_group
 * @property $price_group
 * @property $changed_only
 * @property $system_name
 * @property $website_id
 * @property $with_price_only
 */
class ProductGet extends AbstractType implements TypeInterface
{
    /**
     * @var int
     */
    public const ONLY_WITH_PRICE = 1;
    /**
     * @var int
     */
    public const NOTONLY_WITH_PRICE = 0;

    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'PRODUCT_GET',
        'client_id' => null,
        'product_id' => null,
        'product_group' => null,
        'price_group' => null,
        'changed_only' => null,
        'system_name' => null,
        'website_id' => null,
        'with_price_only' => null,
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
