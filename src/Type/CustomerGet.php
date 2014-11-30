<?php
/**
 * Collmex Customer Get Type
 *
 * PHP version 5.3
 *
 * @category  Collmex
 * @package   Type
 * @author    Marcus Jaschen <mail@marcusjaschen.de>
 * @copyright 2013 Marcus Jaschen
 * @license   http://www.opensource.org/licenses/mit-license MIT License
 * @link      http://github.com/mjaschen/collmex
 */

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Customer Get Type
 *
 * @category Collmex
 * @package  Type
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     http://github.com/mjaschen/collmex
 */
class CustomerGet extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = array(
        'type_identifier'  => 'CUSTOMER_GET',
        'customer_id'      => null,
        'client_id'        => null,
        'query'            => null,
        'follow-up'        => null,
        'zipcode'          => null,
        'address_group_id' => null,
        'price_group_id'   => null,
        'discount_id'      => null,
        'agent_id'         => null,
        'only_changed'     => null,
        'system_name'      => null,
        'inactive'         => null,

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
