<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex PurchaseOrder Type.
 *
 * @author  Marcus Jaschen <mjaschen@gmail.com>
 * @author  René Galle <renegalle.webdevelopment@gmail.com>
 *
 * @property $type_identifier
 * @property $purchase_order_id
 * @property $position
 * @property $kind_of_purchase_order
 * @property $client_id
 * @property $supplier_id
 * @property $supplier_salutation
 * @property $supplier_title
 * @property $supplier_firstname
 * @property $supplier_lastname
 * @property $supplier_company
 * @property $supplier_department
 * @property $supplier_street
 * @property $supplier_zip
 * @property $supplier_city
 * @property $supplier_country
 * @property $supplier_tel
 * @property $supplier_tel2
 * @property $supplier_telefax
 * @property $supplier_email
 * @property $supplier_account_number
 * @property $supplier_bank_routing_number
 * @property $supplier_different_dipositor
 * @property $supplier_IBAN
 * @property $supplier_BIC
 * @property $supplier_bank
 * @property $supplier_business_tax_id
 * @property $supplier_tax_id
 * @property $supplier_private_person
 * @property $purchase_order_date
 * @property $payment_conditions
 * @property $currency
 * @property $purchase_order_note
 * @property $closing_note
 * @property $internal_note
 * @property $deleted
 * @property $completed
 * @property $lang
 * @property $issuer_id
 * @property $delivery_conditions
 * @property $delivery_additions
 * @property $delivery_address_salutation
 * @property $delivery_address_title
 * @property $delivery_address_firstname
 * @property $delivery_address_lastname
 * @property $delivery_address_company
 * @property $delivery_address_department
 * @property $delivery_address_street
 * @property $delivery_address_zip
 * @property $delivery_address_city
 * @property $delivery_address_country
 * @property $delivery_address_tel
 * @property $delivery_address_tel2
 * @property $delivery_address_telefax
 * @property $delivery_address_email
 * @property $status
 * @property $sales_order_id
 * @property $reserved_1
 * @property $reserved_2
 * @property $position_type
 * @property $product_id
 * @property $product_id_of_supplier
 * @property $product_description
 * @property $unit
 * @property $quantity
 * @property $delivery_date
 * @property $unit_price
 * @property $price_quantity
 * @property $packaging_unit
 * @property $delivery_time
 * @property $position_value
 * @property $purchase_order_position
 */
class PurchaseOrder extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        // 1
        'type_identifier' => 'CMXPOD',
        'purchase_order_id' => null,
        'position' => null,
        // reserved
        'kind_of_purchase_order' => null,
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
        'supplier_zip' => null,
        // 15
        'supplier_city' => null,
        'supplier_country' => null,
        'supplier_tel' => null,
        'supplier_tel2' => null,
        'supplier_telefax' => null,
        // 20
        'supplier_email' => null,
        'supplier_account_number' => null,
        'supplier_bank_routing_number' => null,
        'supplier_different_dipositor' => null,
        'supplier_IBAN' => null,
        // 25
        'supplier_BIC' => null,
        'supplier_bank' => null,
        'supplier_business_tax_id' => null,
        'supplier_tax_id' => null,
        'supplier_private_person' => null,
        // 30
        'purchase_order_date' => null,
        'payment_conditions' => null,
        'currency' => null,
        'purchase_order_note' => null,
        'closing_note' => null,
        // 35
        'internal_note' => null,
        'deleted' => null,
        'completed' => null,
        'lang' => null,
        'issuer_id' => null,
        // 40
        'delivery_conditions' => null,
        'delivery_additions' => null,
        'delivery_address_salutation' => null,
        'delivery_address_title' => null,
        'delivery_address_firstname' => null,
        // 45
        'delivery_address_lastname' => null,
        'delivery_address_company' => null,
        'delivery_address_department' => null,
        'delivery_address_street' => null,
        'delivery_address_zip' => null,
        // 50
        'delivery_address_city' => null,
        'delivery_address_country' => null,
        'delivery_address_tel' => null,
        'delivery_address_tel2' => null,
        'delivery_address_telefax' => null,
        // 55
        'delivery_address_email' => null,
        'status' => null,
        'sales_order_id' => null,
        // reserved
        'reserved_1' => null,
        // reserved
        'reserved_2' => null,
        // 60
        'position_type' => null,
        'product_id' => null,
        'product_id_of_supplier' => null,
        'product_description' => null,
        'unit' => null,
        // 65
        'quantity' => null,
        'delivery_date' => null,
        'unit_price' => null,
        'price_quantity' => null,
        'packaging_unit' => null,
        // 70
        'delivery_time' => null,
        'position_value' => null,
        // 72
        'purchase_order_position' => null,
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
