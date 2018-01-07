<?php
/**
 * Collmex PurchaseOrder Type
 *
 * @author  Marcus Jaschen <mjaschen@gmail.com>
 * @author  René Galle <renegalle.webdevelopment@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license MIT License
 * @link    https://github.com/mjaschen/collmex
 */

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex PurchaseOrder Type
 *
 * @author  Marcus Jaschen <mjaschen@gmail.com>
 * @author  René Galle <renegalle.webdevelopment@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license MIT License
 * @link    https://github.com/mjaschen/collmex
 */
class PurchaseOrder extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier'              => 'CMXPOD', // 1
        'purchase_order_id'            => null,
        'position'                     => null,
        'kind_of_purchase_order'       => null, // reserved
        'client_id'                    => null, // 5
        'supplier_id'                  => null,
        'supplier_salutation'          => null,
        'supplier_title'               => null,
        'supplier_firstname'           => null,
        'supplier_lastname'            => null, // 10
        'supplier_company'             => null,
        'supplier_department'          => null,
        'supplier_street'              => null,
        'supplier_zip'                 => null,
        'supplier_city'                => null, // 15
        'supplier_country'             => null,
        'supplier_tel'                 => null,
        'supplier_tel2'                => null,
        'supplier_telefax'             => null,
        'supplier_email'               => null, // 20
        'supplier_account_number'      => null,
        'supplier_bank_routing_number' => null,
        'supplier_different_dipositor' => null,
        'supplier_IBAN'                => null,
        'supplier_BIC'                 => null, // 25
        'supplier_bank'                => null,
        'supplier_business_tax_id'     => null,
        'supplier_tax_id'              => null,
        'supplier_private_person'      => null,
        'purchase_order_date'          => null, // 30
        'payment_conditions'           => null,
        'currency'                     => null,
        'purchase_order_note'          => null,
        'closing_note'                 => null,
        'internal_note'                => null, // 35
        'deleted'                      => null,
        'completed'                    => null,
        'lang'                         => null,
        'issuer_id'                    => null,
        'delivery_conditions'          => null, // 40
        'delivery_additions'           => null,
        'delivery_address_salutation'  => null,
        'delivery_address_title'       => null,
        'delivery_address_firstname'   => null,
        'delivery_address_lastname'    => null, // 45
        'delivery_address_company'     => null,
        'delivery_address_department'  => null,
        'delivery_address_street'      => null,
        'delivery_address_zip'         => null,
        'delivery_address_city'        => null, // 50
        'delivery_address_country'     => null,
        'delivery_address_tel'         => null,
        'delivery_address_tel2'        => null,
        'delivery_address_telefax'     => null,
        'delivery_address_email'       => null, // 55
        'status'                       => null,
        'sales_order_id'               => null,
        'reserved_1'                   => null, // reserved
        'reserved_2'                   => null, // reserved
        'position_type'                => null, // 60
        'product_id'                   => null,
        'product_id_of_supplier'       => null,
        'product_description'          => null,
        'unit'                         => null,
        'quantity'                    => null, // 65
        'delivery_date'                => null,
        'unit_price'                   => null,
        'price_quantity'               => null,
        'packaging_unit'               => null,
        'delivery_time'                => null, // 70
        'position_value'               => null,
        'purchase_order_position'      => null, // 72
    ];

    /**
     * Formally validates the type data in $data attribute.
     *
     * @return bool Validation success
     */
    public function validate()
    {
        return true;
    }
}
