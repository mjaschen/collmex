<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Voucher Type.
 *
 * @see https://www.collmex.de/c.cmx?1005,1,help,api_Gutscheine
 *
 * @property string $type_identifier
 * @property int $voucher_id
 * @property int $client_id
 * @property int $usage
 * @property string|int $valid_from
 * @property string|int $valid_to
 * @property numeric $discount_percentage
 * @property string|int $discount_total
 * @property string $voucher_desc
 * @property int $agent_id
 * @property string|int $min_order_value
 * @property string $currency
 * @property int $redemption_count
 */
class Voucher extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'VOUCHER',
        'voucher_id' => null,
        'client_id' => null,
        'usage' => null,
        'valid_from' => null,
        'valid_to' => null,
        'discount_percentage' => null,
        'discount_total' => null,
        'voucher_desc' => null,
        'agent_id' => null,
        'min_order_value' => null,
        'currency' => null,
        'redemption_count' => null,
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
