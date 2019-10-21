<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Delivery Type.
 *
 * @author  Marcus Jaschen <mjaschen@gmail.com>
 * @author  René Galle <renegalle.webdevelopment@gmail.com>
 *
 * @property $type_identifier
 * @property $delivery_id
 * @property $position
 * @property $kind_of_delivery
 * @property $client_id
 * @property $customer_id
 * @property $order_id
 * @property $customer_salutation
 * @property $customer_title
 * @property $customer_firstname
 * @property $customer_lastname
 * @property $customer_company
 * @property $customer_department
 * @property $customer_street
 * @property $customer_zip
 * @property $customer_city
 * @property $customer_country
 * @property $customer_tel
 * @property $customer_tel2
 * @property $customer_telefax
 * @property $customer_email
 * @property $customer_account_number
 * @property $customer_bank_routing_number
 * @property $customer_different_dipositor
 * @property $customer_IBAN
 * @property $customer_BIC
 * @property $customer_bank
 * @property $customer_business_tax_id
 * @property $customer_private_person
 * @property $order_id_at_customer
 * @property $delivery_date
 * @property $delivery_note
 * @property $closing_note
 * @property $internal_note
 * @property $deleted
 * @property $completed
 * @property $status
 * @property $lang
 * @property $issuer_id
 * @property $weight
 * @property $amount_to_be_collected
 * @property $currency
 * @property $tracking_code
 * @property $mode_of_shipment
 * @property $delivery_specifications
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
 * @property $position_type
 * @property $product_id
 * @property $product_description
 * @property $unit
 * @property $quantity
 * @property $customer_order_position
 * @property $ean
 * @property $handover_required
 * @property $last_handover
 */
class Delivery extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        // 1
        'type_identifier' => 'CMXDLV',
        'delivery_id' => null,
        'position' => null,
        // reserved
        'kind_of_delivery' => null,
        // 5
        'client_id' => null,
        'customer_id' => null,
        'order_id' => null,
        'customer_salutation' => null,
        'customer_title' => null,
        // 10
        'customer_firstname' => null,
        'customer_lastname' => null,
        'customer_company' => null,
        'customer_department' => null,
        'customer_street' => null,
        // 15
        'customer_zip' => null,
        'customer_city' => null,
        'customer_country' => null,
        'customer_tel' => null,
        'customer_tel2' => null,
        // 20
        'customer_telefax' => null,
        'customer_email' => null,
        'customer_account_number' => null,
        'customer_bank_routing_number' => null,
        'customer_different_dipositor' => null,
        // 25
        'customer_IBAN' => null,
        'customer_BIC' => null,
        'customer_bank' => null,
        'customer_business_tax_id' => null,
        'customer_private_person' => null,
        // 30
        'order_id_at_customer' => null,
        'delivery_date' => null,
        'delivery_note' => null,
        'closing_note' => null,
        'internal_note' => null,
        // 35
        'deleted' => null,
        'completed' => null,
        'status' => null,
        'lang' => null,
        'issuer_id' => null,
        // 40
        'weight' => null,
        'amount_to_be_collected' => null,
        'currency' => null,
        'tracking_code' => null,
        'mode_of_shipment' => null,
        // 45
        'delivery_specifications' => null,
        'delivery_additions' => null,
        'delivery_address_salutation' => null,
        'delivery_address_title' => null,
        'delivery_address_firstname' => null,
        // 50
        'delivery_address_lastname' => null,
        'delivery_address_company' => null,
        'delivery_address_department' => null,
        'delivery_address_street' => null,
        'delivery_address_zip' => null,
        // 55
        'delivery_address_city' => null,
        'delivery_address_country' => null,
        'delivery_address_tel' => null,
        'delivery_address_tel2' => null,
        'delivery_address_telefax' => null,
        // 60
        'delivery_address_email' => null,
        'position_type' => null,
        'product_id' => null,
        'product_description' => null,
        'unit' => null,
        // 65
        'quantity' => null,
        'customer_order_position' => null,
        'ean' => null,
        'handover_required' => null,
        // 69
        'last_handover' => null,
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
