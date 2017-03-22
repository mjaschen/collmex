<?php
/**
 * Collmex Delivery Get Type
 *
 * @author  Marcus Jaschen <mjaschen@gmail.com>
 * @author  René Galle <renegalle.webdevelopment@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license MIT License
 * @link    https://github.com/mjaschen/collmex
 */

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Delivery Get Type
 *
 * @author  Marcus Jaschen <mjaschen@gmail.com>
 * @author  René Galle <renegalle.webdevelopment@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license MIT License
 * @link    https://github.com/mjaschen/collmex
 */
class DeliveryGet extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier'       => 'DELIVERY_GET',
        'delivery_id'           => null,
        'client_id'             => null,
        'customer_id'           => null,
        'delivery_date_from'    => null,
        'delivery_date_to'      => null,
        'issued_only'           => null,
        'returned_format'       => null,
        'changed_only'          => null,
        'system_name'           => null,
        'no_writing_paper'      => null,
        'order_id'              => null,
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
