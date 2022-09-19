<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Supplier Credit Type.
 *
 * @author  Lenard Kratky <l.kratky@lakdev.de>
 *
 * @property $type_identifier
 * @property $credit_id
 * @property $position
 * @property $credit_type
 * @property $client_id
 * @property $supplier_id
 * @property $supplier_salutation
 * @property $supplier_title
 * @property $supplier_firstname
 * @property $supplier_lastname
 * @property $supplier_company
 * @property $supplier_department
 * @property $supplier_street
 * @property $supplier_zipcode
 * @property $supplier_city
 * @property $supplier_country
 * @property $supplier_phone
 * @property $supplier_phone_2
 * @property $supplier_fax
 * @property $supplier_email
 * @property $supplier_bank_account
 * @property $supplier_bank_code
 * @property $supplier_bank_account_owner
 * @property $supplier_bank_iban
 * @property $supplier_bank_bic
 * @property $supplier_bank_name
 * @property $supplier_vat_id
 * @property $supplier_tax_id
 * @property $supplier_private
 * @property $credit_date
 * @property $terms_of_payment
 * @property $currency
 * @property $credit_text
 * @property $final_text
 * @property $internal_memo
 * @property $deleted
 * @property $language
 * @property $employee_id
 * @property $status
 * @property $reserved
 * @property $reserved_2
 * @property $reserved_3
 * @property $position_type
 * @property $product_id
 * @property $product_id_supplier
 * @property $product_description
 * @property $quantity_unit
 * @property $quantity
 * @property $price
 * @property $price_quantity
 * @property $position_value
 * @property $tax_rate
 */
class SupplierCredit extends AbstractType implements TypeInterface
{
    /**
     * @var int
     */
    public const NOT_DELETED = 0;
    /**
     * @var int
     */
    public const DELETED = 1;

    /**
     * @var int
     */
    public const LANGUAGE_GERMAN = 0;
    /**
     * @var int
     */
    public const LANGUAGE_ENGLISH = 1;

    /**
     * @var int
     */
    public const STATUS_NEW = 0;
    /**
     * @var int
     */
    public const STATUS_OPEN = 10;
    /**
     * @var int
     */
    public const STATUS_PARTIALLY_SHIPPED = 20;
    /**
     * @var int
     */
    public const STATUS_DONE = 30;
    /**
     * @var int
     */
    public const STATUS_DELETED = 40;

    /**
     * @var int
     */
    public const POSITION_NORMAL = 0;
    /**
     * @var int
     */
    public const POSITION_TEXT = 2;

    /**
     * @var int
     */
    public const TAX_RATE_FULL = 0;
    /**
     * @var int
     */
    public const TAX_RATE_REDUCED = 1;
    /**
     * @var int
     */
    public const TAX_RATE_TAXFREE = 2;

    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'CMXSBI',
        'credit_id' => null,
        'position' => null,
        'credit_type' => null,
        // 5
        'client_id' => null,
        'supplier_id' => null,
        'supplier_salutation' => null,
        'supplier_title' => null,
        'supplier_firstname' => null,
        // 10
        'supplier_lastname' => null,
        'supplier_company' => null,
        'supplier_department' => null,
        'supplier_street' => null,
        'supplier_zipcode' => null,
        // 15
        'supplier_city' => null,
        'supplier_country' => null,
        'supplier_phone' => null,
        'supplier_phone_2' => null,
        'supplier_fax' => null,
        // 20
        'supplier_email' => null,
        'supplier_bank_account' => null,
        'supplier_bank_code' => null,
        'supplier_bank_account_owner' => null,
        'supplier_bank_iban' => null,
        // 25
        'supplier_bank_bic' => null,
        'supplier_bank_name' => null,
        'supplier_vat_id' => null,
        'supplier_tax_id' => null,
        'supplier_private_person' => null,
        // 30
        'credit_date' => null,
        'terms_of_payment' => null,
        'currency' => null,
        'credit_text' => null,
        'final_text' => null,
        // 35
        'internal_memo' => null,
        'deleted' => null,
        'language' => null,
        'employee_id' => null,
        'status' => null,
        // 40
        'reserved_1' => null,
        'reserved_2' => null,
        'reserved_3' => null,
        'position_type' => null,
        'product_id' => null,
        // 45
        'product_id_supplier' => null,
        'product_description' => null,
        'quantity_unit' => null,
        'quantity' => null,
        'price' => null,
        // 50
        'price_quantity' => null,
        'position_value' => null,
        'tax_rate' => null,
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
