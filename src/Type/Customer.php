<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Customer Type.
 *
 * @property string $type_identifier
 * @property int $customer_id
 * @property int $client_id
 * @property string $salutation
 * @property string $title
 * @property string $firstname
 * @property string $lastname
 * @property string $company
 * @property string $department
 * @property string $street
 * @property string $zipcode
 * @property string $city
 * @property string $annotation
 * @property int $inactive
 * @property string $country
 * @property string $phone
 * @property string $fax
 * @property string $email
 * @property string $bank_account
 * @property string $bank_code
 * @property string $iban
 * @property string $bic
 * @property string $bank_name
 * @property mixed $reserved_1
 * @property string $vat_id
 * @property int $terms_of_payment
 * @property int $discount_id
 * @property string $delivery_conditions
 * @property string $delivery_conditions_additional
 * @property int $output_medium
 * @property string $bank_account_owner
 * @property string|int $address_group_id
 * @property string $ebay_account_name
 * @property int $price_group_id
 * @property string $currency
 * @property int $agent_id
 * @property string $cost_center
 * @property string|int $follow_up_date
 * @property int $delivery_block
 * @property int $construction_service_provider
 * @property string $customer_supplier_number
 * @property int $output_language
 * @property string $email_cc
 * @property string $phone_2
 * @property string $mandate_reference
 * @property string|int $mandate_reference_sign_date
 * @property int $dunning_block
 * @property int $no_mailings
 * @property int $private_person
 * @property string $url
 * @property int $partial_delivery_allowed
 * @property int $partial_invoice_allowed
 * @property string|int $created_at
 * @property int $invoice_format
 */
class Customer extends AbstractType implements TypeInterface
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
        'type_identifier' => 'CMXKND',
        'customer_id' => null,
        'client_id' => null,
        'salutation' => null,
        // 5
        'title' => null,
        'firstname' => null,
        'lastname' => null,
        'company' => null,
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
        'reserved_1' => null,
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
        'partial_invoice_allowed' => null,
        'created_at' => null,
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
