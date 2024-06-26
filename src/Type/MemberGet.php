<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Member Get Type.
 *
 * @see https://www.collmex.de/handbuch_verein.html#api_Mitglieder
 *
 * @property $type_identifier
 * @property $customer_id
 * @property $client_id
 * @property $query
 * @property $zipcode
 * @property $address_group_id
 * @property $exited_too
 * @property $changed_only
 * @property $system_name
 * @property $reporting_date
 * @property $entrance_date_from
 * @property $entrance_date_to
 * @property $exit_date_from
 * @property $exit_date_to
 * @property $birthday_from
 * @property $birthday_to
 */
class MemberGet extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        // 1
        'type_identifier' => 'MEMBER_GET',
        'customer_id' => null,
        'client_id' => null,
        'query' => null,
        // 5
        'zipcode' => null,
        'address_group_id' => null,
        'exited_too' => null,
        'changed_only' => null,
        'system_name' => null,
        // 10
        'reporting_date' => null,
        'entrance_date_from' => null,
        'entrance_date_to' => null,
        'exit_date_from' => null,
        'exit_date_to' => null,
        // 15
        'birthday_from' => null,
        'birthday_to' => null,
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
