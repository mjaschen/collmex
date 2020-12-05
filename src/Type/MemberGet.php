<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Customer Get Type.
 *
 * @author    Sebastian Gunreben
 * @author    Marcus Jaschen <mail@marcusjaschen.de>
 *
 * @property $type_identifier
 * @property $customer_id
 * @property $client_id
 * @property $query
 * @property $zipcode
 * @property $address_group_id
 * @property $exited_too
 * @property $only_changed
 * @property $system_name
 */
class MemberGet extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'MEMBER_GET',
        'customer_id' => null,
        'client_id' => null,
        'query' => null,
        'zipcode' => null,
        'address_group_id' => null,
        'exited_too' => null,
        'only_changed' => null,
        'system_name' => null,
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
