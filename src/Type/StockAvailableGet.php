<?php
/**
 * Collmex StockAvailableGet Type
 *
 * @author    Marcus Jaschen <mail@marcusjaschen.de>
 * @author    René Galle <renegalle.webdevelopment@gmail.com>
 * @license   http://www.opensource.org/licenses/mit-license MIT License
 * @link      https://github.com/mjaschen/collmex
 */

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex StockAvailableGet Type
 *
 * IMPORTANT NOTE:
 * Collmex is doing a lot of processing on this request. For example, it
 * is checking for orders that did not yet affect the overall stock. This
 * is very time consuming and can result in long loading times. A test
 * with 1200 products on an production system took around 25 - 28 seconds.
 * If you are only interested in what you physically have in store, you
 * might take a look at `StockGet`.
 *
 * @see StockGet
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @author   René Galle <renegalle.webdevelopment@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     https://github.com/mjaschen/collmex
 */
class StockAvailableGet extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'STOCK_AVAILABLE_GET',
        'client_id' => null,
        'product_id' => null,
        'changed_only' => null,
        'system_name' => null,
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
