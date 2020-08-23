<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Voucher Type.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 *
 * @property $type_identifier
 * @property $voucher_id
 * @property $client_id
 * @property $usage
 * @property $valid_from
 * @property $valid_to
 * @property $discount_percentage
 * @property $discount_total
 * @property $voucher_desc
 * @property $agent_id
 * @property $min_order_value
 * @property $currency
 */
class Voucher extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = array(
        'type_identifier'       => 'VOUCHER',
        'voucher_id'            => null,
        'client_id'             => null,
        'usage'                 => null,
        'valid_from'            => null,
        'valid_to'              => null,
        'discount_percentage'   => null,
        'discount_total'        => null,
        'voucher_desc'          => null,
        'agent_id'              => null,
        'min_order_value'       => null,
        'currency'              => null
    );

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
