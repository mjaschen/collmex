<?php
declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Member Type
 *
 * @author    Sebastian Gunreben
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 *
 * @property $type_identifier
 * @property $customer_id
 * @property $salutation
 * @property $title
 * @property $forename
 * @property $lastname
 * @property $firm
 * @property $department
 * @property $street
 * @property $zipcode
 * @property $city
 * @property $delete
 * @property $url
 * @property $country
 * @property $phone
 * @property $fax
 * @property $email
 * @property $bank_account
 * @property $bank_code
 * @property $iban
 * @property $bic
 * @property $bank_name
 * @property $mandate_reference
 * @property $mandate_reference_sign_date
 * @property $birthday
 * @property $entrance_date
 * @property $exit_date
 * @property $annotation
 * @property $phone2
 * @property $skype
 * @property $bankaccount_owner
 * @property $printout_medium
 * @property $address_group
 * @property $payment_agreement
 * @property $payment_via
 * @property $printout_language
 * @property $cost_center
 */
class Member extends AbstractType implements TypeInterface
{
    const STATUS_ACTIVE = 0;
    const STATUS_INACTIVE = 1;

    const OUTPUT_MEDIUM_PRINT = 0;
    const OUTPUT_MEDIUM_EMAIL = 1;
    const OUTPUT_MEDIUM_FAX = 2;
    const OUTPUT_MEDIUM_MAIL = 3;

    const NO_DELIVERY_BLOCK = 0;
    const DELIVERY_BLOCK = 1;

    const NO_CONSTRUCTION_SERVICE_PROVIDER = 0;
    const CONSTRUCTION_SERVICE_PROVIDER = 1;

    const LANGUAGE_GERMAN = 0;
    const LANGUAGE_ENGLISH = 1;

    /**
     * Type data template
     *
     * @var array
     */
    protected $template = [
        'type_identifier' => 'CMXMGD',   // 1
        'customer_id' => null,
        'salutation' => null,
        'title' => null,
        'forename' => null,       // 5
        'lastname' => null,
        'firm' => null,
        'department' => null,
        'street' => null,
        'zipcode' => null,       // 10
        'city' => null,
        'delete' => null,
        'url' => null,
        'country' => null,
        'phone' => null,       // 15
        'fax' => null,
        'email' => null,
        'bank_account' => null,
        'bank_code' => null,
        'iban' => null,       // 20
        'bic' => null,
        'bank_name' => null,
        'mandate_reference' => null,
        'mandate_reference_sign_date' => null,
        'birthday' => null,       // 25
        'entrance_date' => null,
        'exit_date' => null,
        'annotation' => null,
        'phone2' => null,
        'skype' => null,       // 30
        'bankaccount_owner' => null,
        'printout_medium' => null,
        'address_group' => null,
        'payment_agreement' => null,
        'payment_via' => null,       // 35
        'printout_language' => null,
        'cost_center' => null,
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
