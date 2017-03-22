<?php
/**
 * Collmex Different Shipping Address Type
 *
 * @author  Marcus Jaschen <mjaschen@gmail.com>
 * @author  René Galle <renegalle.webdevelopment@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license MIT License
 * @link    https://github.com/mjaschen/collmex
 */

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Different Shipping Address Type
 *
 * @author  Marcus Jaschen <mjaschen@gmail.com>
 * @author  René Galle <renegalle.webdevelopment@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license MIT License
 * @link    https://github.com/mjaschen/collmex
 */
class DifferentShippingAddress extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier'               => 'CMXEPF',
        'customer_id'                   => null,
        'client_id'                     => null,
        'document_type'                 => null,
        'output_medium'                 => null,
        'salutation'                    => null,
        'title'                         => null,
        'firstname'                     => null,
        'lastname'                      => null,
        'firm'                          => null,
        'department'                    => null,
        'street'                        => null,
        'zipcode'                       => null,
        'city'                          => null,
        'country'                       => null,
        'phone'                         => null,
        'phone2'                        => null,
        'fax'                           => null,
        'skype_voip'                    => null,
        'email'                         => null,
        'annotation'                    => null,
        'url'                           => null,
        'no_mailings'                   => null,
        'address_group'                 => null,
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
