<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Address Type.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 *
 * @property $type_identifier
 * @property $address_number
 * @property $address_type
 * @property $salutation
 * @property $title
 * @property $first_name
 * @property $name
 * @property $company
 * @property $department
 * @property $street
 * @property $zipcode
 * @property $city
 * @property $note
 * @property $inactive
 * @property $country
 * @property $phone
 * @property $fax
 * @property $email
 * @property $bank_account
 * @property $bank_code
 * @property $bank_iban
 * @property $bank_bic
 * @property $bank_name
 * @property $tax_number
 * @property $vat_id
 * @property $no_mailings
 * @property $phone_2
 * @property $skype_voip
 * @property $url
 * @property $bank_account_owner
 * @property $resubmission
 * @property $address_group
 * @property $mediator
 * @property $mediator_company_number
 * @property $direct_debit_mandate_reference
 * @property $date_signature
 * @property $date_resubmission
 * @property $contact_person_address_number
 */
class Address extends AbstractType implements TypeInterface
{
    /**
     * @var int
     */
    public const ADDRESS_TYPE_CUSTOMER_SUPPLIER_MEMBER = 0;

    /**
     * @var int
     */
    public const ADDRESS_TYPE_ADDRESS_MANAGEMENT = 3;

    /**
     * @var int
     */
    public const ADDRESS_TYPE_CONTACT = 4;

    /**
     * @var int
     */
    public const INACTIVE_ACTIVE = 0;

    /**
     * @var int
     */
    public const INACTIVE_INACTIVE = 1;

    /**
     * @var int
     */
    public const INACTIVE_DELETE = 2;

    /**
     * @var int
     */
    public const INACTIVE_DELETE_UNUSED = 3;

    /**
     * @var int
     */
    public const NO_MAILING_NOT_SET = 0;

    /**
     * @var int
     */
    public const NO_MAILING_NO_MAILING = 1;

    /**
     * Type data template.
     *
     * @var array
     */
    protected $template = [
        'type_identifier' => 'CMXADR',
        'address_number' => null,
        'address_type' => null,
        'salutation' => null,
        // 5
        'title' => null,
        'first_name' => null,
        'name' => null,
        'company' => null,
        'department' => null,
        // 10
        'street' => null,
        'zipcode' => null,
        'city' => null,
        'note' => null,
        'inactive' => null,
        // 15
        'country' => null,
        'phone' => null,
        'fax' => null,
        'email' => null,
        'bank_account' => null,
        // 20
        'bank_code' => null,
        'bank_iban' => null,
        'bank_bic' => null,
        'bank_name' => null,
        'tax_number' => null,
        // 25
        'vat_id' => null,
        'no_mailings' => null,
        'phone_2' => null,
        'skype_voip' => null,
        'url' => null,
        // 30
        'bank_account_owner' => null,
        'resubmission' => null,
        'address_group' => null,
        'mediator' => null,
        'mediator_company_number' => null,
        // 35
        'direct_debit_mandate_reference' => null,
        'date_signature' => null,
        'date_resubmission' => null,
        'contact_person_address_number' => null,
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
