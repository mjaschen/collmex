<?php

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Subscription Get Type
 *
 * @author   Jewel Ahmed <tojibon@gmail.com>
 * @author   Marcus Jaschen <mjaschen@gmail.com>
 * @author   Jesus Ortiz <ortizko@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     https://github.com/mjaschen/collmex
 */
class SubscriptionGet extends AbstractType implements TypeInterface
{
    /**
     * Type data template
     *
     * @var array
     */
    protected $template = array(
        'type_identifier'     => 'ABO_GET',
        'customer_id'         => null,
        'client_id'           => null,
        'product_id'          => null,
    );


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
