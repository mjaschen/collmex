<?php
/**
 * Collmex ProductPrice Type
 *
 * @author    Marcus Jaschen <mail@marcusjaschen.de>
 * @author    René Galle <renegalle.webdevelopment@gmail.com>
 * @license   http://www.opensource.org/licenses/mit-license MIT License
 * @link      https://github.com/mjaschen/collmex
 */

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex ProductPrice Type
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @author   René Galle <renegalle.webdevelopment@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     https://github.com/mjaschen/collmex
 */
class ProductPrice extends AbstractType implements TypeInterface
{
    /**
     * Type data template
     *
     * @var array
     */
    protected $template = [
        'type_identifier' => 'CMXPRI',
        'product_id'      => null,
        'client_id'       => null,
        'price_group_id'  => null,
        'valid_from'      => null,
        'valid_to'        => null,
        'price'           => null,

    ];

    /**
     * Formally validates the type data in $data attribute.
     *
     * @return bool Validation success
     */
    public function validate()
    {
        // TODO: Implement validate() method.
    }
}
