<?php
/**
 * Collmex PurchaseOrderGet Type
 *
 * @author    Marcus Jaschen <mail@marcusjaschen.de>
 * @author    René Galle <renegalle.webdevelopment@gmail.com>
 * @license   http://www.opensource.org/licenses/mit-license MIT License
 * @link      https://github.com/mjaschen/collmex
 */

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex PurchaseOrderGet Type
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @author   René Galle <renegalle.webdevelopment@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     https://github.com/mjaschen/collmex
 */
class PurchaseOrderGet extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier'   => 'PURCHASE_ORDER_GET',
        'purchase_order_id' => null,
        'client_id'         => null,
        'supplier_id'       => null,
        'product_id'        => null,
        'sent_only'         => null,
        'return_format'     => null,
        'changed_only'      => null,
        'system_name'       => null,
        'do_not_use_letter' => null,
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
