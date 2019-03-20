<?php
declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Customer Type
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     https://github.com/mjaschen/collmex
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
    const STATUS_ACTIVE                    = 0;
    const STATUS_INACTIVE                  = 1;

    const OUTPUT_MEDIUM_PRINT              = 0;
    const OUTPUT_MEDIUM_EMAIL              = 1;
    const OUTPUT_MEDIUM_FAX                = 2;
    const OUTPUT_MEDIUM_MAIL               = 3;

    const NO_DELIVERY_BLOCK                = 0;
    const DELIVERY_BLOCK                   = 1;

    const NO_CONSTRUCTION_SERVICE_PROVIDER = 0;
    const CONSTRUCTION_SERVICE_PROVIDER    = 1;

    const LANGUAGE_GERMAN                  = 0;
    const LANGUAGE_ENGLISH                 = 1;

    /**
     * Type data template
     *
     * @var array
     */
    protected $template = [
        'type_identifier'                => 'CMXKND',   // 1
        'customer_id'                    => null,
        'client_id'                      => null,
        'salutation'                     => null,
        'title'                          => null,       // 5
        'forename'                       => null,
        'lastname'                       => null,
        'firm'                           => null,
        'department'                     => null,
        'street'                         => null,       // 10
        'zipcode'                        => null,
        'city'                           => null,
        'annotation'                     => null,
        'inactive'                       => null,
        'country'                        => null,       // 15
        'phone'                          => null,
        'fax'                            => null,
        'email'                          => null,
        'bank_account'                   => null,
        'bank_code'                      => null,       // 20
        'iban'                           => null,
        'bic'                            => null,
        'bank_name'                      => null,
        'tax_id'                         => null,
        'vat_id'                         => null,       // 25
        'terms_of_payment'               => null,
        'discount_id'                    => null,
        'delivery_conditions'            => null,
        'delivery_conditions_additional' => null,
        'output_medium'                  => null,       // 30
        'bank_account_owner'             => null,
        'address_group_id'               => null,
        'ebay_account_name'              => null,
        'price_group_id'                 => null,
        'currency'                       => null,       // 35
        'agent_id'                       => null,
        'cost_center'                    => null,
        'follow_up_date'                 => null,
        'delivery_block'                 => null,
        'construction_service_provider'  => null,       // 40
        'customer_supplier_number'       => null,
        'output_language'                => null,
        'email_cc'                       => null,
        'phone_2'                        => null,
        'mandate_reference'              => null,       // 45
        'mandate_reference_sign_date'    => null,
        'dunning_block'                  => null,
        'no_mailings'                    => null,
        'private_person'                 => null,
        'url'                            => null,       // 50
        'partial_delivery_allowed'       => null,
        'partial_invoice_allowed'        => null,       // 52
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
