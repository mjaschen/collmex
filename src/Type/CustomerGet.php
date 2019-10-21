<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Customer Get Type.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 *
 * @property $type_identifier
 * @property $customer_id
 * @property $client_id
 * @property $query
 * @property $follow
 * @property $zipcode
 * @property $address_group_id
 * @property $price_group_id
 * @property $discount_id
 * @property $agent_id
 * @property $only_changed
 * @property $system_name
 * @property $inactive
 */
class CustomerGet extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'CUSTOMER_GET',
        'customer_id' => null,
        'client_id' => null,
        'query' => null,
        'follow-up' => null,
        'zipcode' => null,
        'address_group_id' => null,
        'price_group_id' => null,
        'discount_id' => null,
        'agent_id' => null,
        'only_changed' => null,
        'system_name' => null,
        'inactive' => null,
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
