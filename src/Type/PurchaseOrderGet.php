<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex PurchaseOrderGet Type.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @author   René Galle <renegalle.webdevelopment@gmail.com>
 *
 * @property $type_identifier
 * @property $purchase_order_id
 * @property $client_id
 * @property $supplier_id
 * @property $product_id
 * @property $sent_only
 * @property $return_format
 * @property $changed_only
 * @property $system_name
 * @property $do_not_use_letter
 */
class PurchaseOrderGet extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'PURCHASE_ORDER_GET',
        'purchase_order_id' => null,
        'client_id' => null,
        'supplier_id' => null,
        'product_id' => null,
        'sent_only' => null,
        'return_format' => null,
        'changed_only' => null,
        'system_name' => null,
        'do_not_use_letter' => null,
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
