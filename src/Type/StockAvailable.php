<?php 
/**
 * Collmex StockAvailable Type
 *
 * @author    Marcus Jaschen <mail@marcusjaschen.de>
 * @author    René Galle <renegalle.webdevelopment@gmail.com>
 * @license   http://www.opensource.org/licenses/mit-license MIT License
 * @link      https://github.com/mjaschen/collmex
 */

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex StockAvailable Type
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @author   René Galle <renegalle.webdevelopment@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     https://github.com/mjaschen/collmex
 */
class StockAvailable extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = array(
        'type_identifier'  => 'STOCK_AVAILABLE',
        'product_id'       => null,
        'client_id'        => null,
        'stock'            => null,
        'unit'             => null,
        'reorder_time'     => null
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


 ?>