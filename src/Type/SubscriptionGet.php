<?php

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Subscription Get Type
 *
 * @author   Marcus Jaschen <mjaschen@gmail.com>
 * @author   Jesus Ortiz <ortizko@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     https://github.com/mjaschen/collmex
 */
class SubscriptionGet extends AbstractType implements TypeInterface
{
    const FILTER_ALL             = 0;
    const FILTER_CURRENTLY_VALID = 1;
    const FILTER_CHANGED_ONLY    = 1;

    /**
     * Type data template
     *
     * @var array
     */
    protected $template = array(
        'type_identifier'        => 'ABO_GET',
        'customer_id'            => null,
        'client_id'              => null,
        'product_id'             => null,
        'next_invoice_from'      => null,
        'next_invoice_to'        => null,
        'currently_valid_only'   => null,
        'changed_only'           => null,
        'system_name'            => null,
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
