<?php
/**
 * Collmex Product Get Type
 *
 * @author    Jewel Ahmed <tojibon@gmail.com>
 * @license   http://www.opensource.org/licenses/mit-license MIT License
 * @link      https://github.com/mjaschen/collmex
 */

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Product Get Type
 *
 * @author   Jewel Ahmed <tojibon@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     https://github.com/mjaschen/collmex
 */
class ProductGet extends AbstractType implements TypeInterface
{
    const ONLY_WITH_PRICE = 1;
    const NOTONLY_WITH_PRICE = 0;

    /**
     * @var array
     */
    protected $template = array(
        'type_identifier'	=> 'PRODUCT_GET',
        'client_id'        => null,
        'product_number'   => null,
        'product_group'    => null,
        'price_group'      => null,
        'only_changed'     => null,
        'systemname'       => null,
        'website_number'   => null,
        'only_with_price'  => null,
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
