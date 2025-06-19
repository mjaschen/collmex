<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * @property string $type_identifier
 * @property int $employee_id
 * @property int $client_id
 * @property string $salutation
 * @property string $firstname
 * @property string $lastname
 * @property string $street
 * @property string $zipcode
 * @property string $city
 * @property string $country
 * @property string $phone
 * @property string $phone2
 * @property string $email
 * @property string $note
 * @property string $bank_iban
 * @property string $bank_bic
 * @property string $bank_name
 * @property string $bank_account
 * @property string $bank_code
 * @property string $bank_account_owner
 * @property int $type
 * @property string $joined_at
 * @property string $left_at
 */
class Employee extends AbstractType implements TypeInterface
{
    final public const TYPE_EMPLOYEE = 0;
    final public const TYPE_ENTREPRENEUR = 1;

    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'EMPLOYEE',
        'employee_id' => null,
        'client_id' => null,
        'salutation' => null,
        // 5
        'firstname' => null,
        'lastname' => null,
        'street' => null,
        'zipcode' => null,
        'city' => null,
        // 10
        'country' => null,
        'phone' => null,
        'phone2' => null,
        'email' => null,
        'note' => null,
        // 15
        'bank_iban' => null,
        'bank_bic' => null,
        'bank_name' => null,
        'bank_account' => null,
        'bank_code' => null,
        // 20
        'bank_account_owner' => null,
        'type' => null,
        'joined_at' => null,
        'left_at' => null,
    ];

    /**
     * Formally validates the type data in $data attribute.
     *
     * @return bool Validation success
     */
    #[\Override]
    public function validate(): bool
    {
        return true;
    }
}
