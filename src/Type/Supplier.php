<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Customer Type.
 *
 * @author   Lenard Kratky <l.kratky@lakdev.de>
 *
 * @property $type_identifier
 * @property $supplier_id
 * @property $client_id
 * @property $salutation
 * @property $title
 * @property $firstname
 * @property $lastname
 * @property $company
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
 * @property $delivery_conditions
 * @property $delivery_conditions_additional
 * @property $output_medium
 * @property $bank_account_owner
 * @property $address_group_id
 * @property $supplier_customer_number
 * @property $currency
 * @property $phone_2
 * @property $output_language
 * @property $expense_account
 * @property $input_tax
 * @property $receipt_text
 * @property $cost_center
 * @property $private_person
 * @property $url
 */
class Supplier extends AbstractType implements TypeInterface
{
    public const INACTIVE_STATE_ACTIVE = 0;
    public const INACTIVE_STATE_INACTIVE = 1;
    public const INACTIVE_STATE_DELETE = 2;
    public const INACTIVE_STATE_DELETE_IF_UNUSED = 3;

    public const LANGUAGE_GERMAN = 0;
    public const LANGUAGE_ENGLISH = 1;

    /**
     * Type data template.
     *
     * @var array
     */
    protected $template = [
        'type_identifier' => 'CMXLIF',
        'supplier_id' => null,
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
        'tax_id' => null,
        // 25
        'vat_id' => null,
        'terms_of_payment' => null,
        'delivery_conditions' => null,
        'delivery_conditions_additional' => null,
        'output_medium' => null,
        // 30
        'bank_account_owner' => null,
        'address_group_id' => null,
        'supplier_customer_number' => null,
        'currency' => null,
        'phone_2' => null,
        // 35
        'output_language' => null,
        'expense_account' => null,
        'input_tax' => null,
        'receipt_text' => null,
        'cost_center' => null,
        // 40
        'private_person' => null,
        'url' => null,
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
