<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Member Type.
 *
 * @see https://www.collmex.de/handbuch_verein.html#daten_importieren_mitglieder
 *
 * @property $type_identifier
 * @property $customer_id
 * @property $salutation
 * @property $title
 * @property $firstname
 * @property $lastname
 * @property $company
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
 * @property $no_mailings
 */
class Member extends AbstractType implements TypeInterface
{
    /**
     * @var int
     */
    final public const STATUS_ACTIVE = 0;
    /**
     * @var int
     */
    final public const STATUS_INACTIVE = 1;

    /**
     * @var int
     */
    final public const OUTPUT_MEDIUM_PRINT = 0;
    /**
     * @var int
     */
    final public const OUTPUT_MEDIUM_EMAIL = 1;
    /**
     * @var int
     */
    final public const OUTPUT_MEDIUM_FAX = 2;
    /**
     * @var int
     */
    final public const OUTPUT_MEDIUM_MAIL = 3;

    /**
     * @var int
     */
    final public const NO_DELIVERY_BLOCK = 0;
    /**
     * @var int
     */
    final public const DELIVERY_BLOCK = 1;

    /**
     * @var int
     */
    final public const NO_CONSTRUCTION_SERVICE_PROVIDER = 0;
    /**
     * @var int
     */
    final public const CONSTRUCTION_SERVICE_PROVIDER = 1;

    /**
     * @var int
     */
    final public const LANGUAGE_GERMAN = 0;
    /**
     * @var int
     */
    final public const LANGUAGE_ENGLISH = 1;

    /**
     * Type data template.
     *
     * @var array
     */
    protected $template = [
        // 1
        'type_identifier' => 'CMXMGD',
        'customer_id' => null,
        'salutation' => null,
        'title' => null,
        // 5
        'firstname' => null,
        'lastname' => null,
        'company' => null,
        'department' => null,
        'street' => null,
        // 10
        'zipcode' => null,
        'city' => null,
        'delete' => null,
        'url' => null,
        'country' => null,
        // 15
        'phone' => null,
        'fax' => null,
        'email' => null,
        'bank_account' => null,
        'bank_code' => null,
        // 20
        'iban' => null,
        'bic' => null,
        'bank_name' => null,
        'mandate_reference' => null,
        'mandate_reference_sign_date' => null,
        // 25
        'birthday' => null,
        'entrance_date' => null,
        'exit_date' => null,
        'annotation' => null,
        'phone2' => null,
        // 30
        'skype' => null,
        'bankaccount_owner' => null,
        'printout_medium' => null,
        'address_group' => null,
        'payment_agreement' => null,
        // 35
        'payment_via' => null,
        'printout_language' => null,
        'cost_center' => null,
        'no_mailings' => null,
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
