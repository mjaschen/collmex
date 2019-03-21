<?php
declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex StockChangeGet Type
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @author   René Galle <renegalle.webdevelopment@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     https://github.com/mjaschen/collmex
 *
 * @property $type_identifier
 * @property $client_id
 * @property $product_id
 * @property $date_from
 * @property $date_to
 * @property $customer_id
 * @property $supplier_id
 * @property $include_canceled
 * @property $changed_only
 * @property $system_name
 */
class StockChangeGet extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'STOCK_CHANGE_GET', // 1
        'client_id' => null,
        'product_id' => null,
        'date_from' => null,
        'date_to' => null, // 5
        'customer_id' => null,
        'supplier_id' => null,
        'include_canceled' => null,
        'changed_only' => null,
        'system_name' => null, // 10
    ];

    /**
     * Formally validates the type data in $data attribute.
     *
     * @return bool Validation success
     */
    public function validate(): bool
    {
        return true;
    }
}
