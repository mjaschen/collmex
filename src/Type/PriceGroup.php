<?php

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex PriceGroup Type
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @author   René Galle <renegalle.webdevelopment@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     https://github.com/mjaschen/collmex
 *
 * @property $type_identifier
 * @property $client_id
 * @property $price_group_id
 * @property $name
 * @property $gross
 * @property $currency
 */
class PriceGroup extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'PRICE_GROUP',
        'client_id'       => null,
        'price_group_id'  => null,
        'name'            => null,
        'gross'           => null,
        'currency'        => null,
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
