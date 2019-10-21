<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Customer Type.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 *
 * @property $type_identifier
 * @property $customer_id
 * @property $client_id
 * @property $salutation
 * @property $title
 * @property $forename
 * @property $lastname
 * @property $firm
 * @property $department
 * @property $street
 * @property $zipcode
 * @property $city
 * @property $annotation
 * @property $inactive
 * @property $country
 * @property $phone
 * @property $fax
 * @property $email
 * @property $bank_account
 * @property $bank_code
 * @property $iban
 * @property $bic
 * @property $bank_name
 * @property $tax_id
 * @property $vat_id
 * @property $terms_of_payment
 * @property $discount_id
 * @property $delivery_conditions
 * @property $delivery_conditions_additional
 * @property $output_medium
 * @property $bank_account_owner
 * @property $address_group_id
 * @property $ebay_account_name
 * @property $price_group_id
 * @property $currency
 * @property $agent_id
 * @property $cost_center
 * @property $follow_up_date
 * @property $delivery_block
 * @property $construction_service_provider
 * @property $customer_supplier_number
 * @property $output_language
 * @property $email_cc
 * @property $phone_2
 * @property $mandate_reference
 * @property $mandate_reference_sign_date
 * @property $dunning_block
 * @property $no_mailings
 * @property $private_person
 * @property $url
 * @property $partial_delivery_allowed
 * @property $partial_invoice_allowed
 */
class Customer extends AbstractType implements TypeInterface
{
    /**
     * @var int
     */
    public const STATUS_ACTIVE = 0;
    /**
     * @var int
     */
    public const STATUS_INACTIVE = 1;

    /**
     * @var int
     */
    public const OUTPUT_MEDIUM_PRINT = 0;
    /**
     * @var int
     */
    public const OUTPUT_MEDIUM_EMAIL = 1;
    /**
     * @var int
     */
    public const OUTPUT_MEDIUM_FAX = 2;
    /**
     * @var int
     */
    public const OUTPUT_MEDIUM_MAIL = 3;

    /**
     * @var int
     */
    public const NO_DELIVERY_BLOCK = 0;
    /**
     * @var int
     */
    public const DELIVERY_BLOCK = 1;

    /**
     * @var int
     */
    public const NO_CONSTRUCTION_SERVICE_PROVIDER = 0;
    /**
     * @var int
     */
    public const CONSTRUCTION_SERVICE_PROVIDER = 1;

    /**
     * @var int
     */
    public const LANGUAGE_GERMAN = 0;
    /**
     * @var int
     */
    public const LANGUAGE_ENGLISH = 1;

    /**
     * Type data template.
     *
     * @var array
     */
    protected $template = [
        // 1
        'type_identifier' => 'CMXKND',
        'customer_id' => null,
        'client_id' => null,
        'salutation' => null,
        // 5
        'title' => null,
        'forename' => null,
        'lastname' => null,
        'firm' => null,
        'department' => null,
        // 10
        'street' => null,
        'zipcode' => null,
        'city' => null,
        'annotation' => null,
        'inactive' => null,
        // 15
        'country' => null,
        'phone' => null,
        'fax' => null,
        'email' => null,
        'bank_account' => null,
        // 20
        'bank_code' => null,
        'iban' => null,
        'bic' => null,
        'bank_name' => null,
        'tax_id' => null,
        // 25
        'vat_id' => null,
        'terms_of_payment' => null,
        'discount_id' => null,
        'delivery_conditions' => null,
        'delivery_conditions_additional' => null,
        // 30
        'output_medium' => null,
        'bank_account_owner' => null,
        'address_group_id' => null,
        'ebay_account_name' => null,
        'price_group_id' => null,
        // 35
        'currency' => null,
        'agent_id' => null,
        'cost_center' => null,
        'follow_up_date' => null,
        'delivery_block' => null,
        // 40
        'construction_service_provider' => null,
        'customer_supplier_number' => null,
        'output_language' => null,
        'email_cc' => null,
        'phone_2' => null,
        // 45
        'mandate_reference' => null,
        'mandate_reference_sign_date' => null,
        'dunning_block' => null,
        'no_mailings' => null,
        'private_person' => null,
        // 50
        'url' => null,
        'partial_delivery_allowed' => null,
        // 52
        'partial_invoice_allowed' => null,
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
