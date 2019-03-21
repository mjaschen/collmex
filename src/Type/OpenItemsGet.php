<?php
declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex OpenItemsGet Type
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @author   René Galle <renegalle.webdevelopment@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     https://github.com/mjaschen/collmex
 *
 * @property $type_identifier
 * @property $client_id
 * @property $open_items
 * @property $customer_id
 * @property $supplier_id
 * @property $agent_id
 */
class OpenItemsGet extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'OPEN_ITEMS_GET',
        'client_id' => null,
        'open_items' => null, // if empty or 0 => customer, if 1 => supplier
        'customer_id' => null,
        'supplier_id' => null,
        'agent_id' => null,
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
