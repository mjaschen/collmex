<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Voucher Get Type.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 *
 * @property $type_identifier
 * @property $voucher_id
 * @property $client_id
 * @property $customer_id
 * @property $agent_id
 * @property $voucher_desc
 * @property $show_expired
 * @property $changed_only
 * @property $system_name
 */
class VoucherGet extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'VOUCHER_GET',
        'voucher_id' => null,
        'client_id' => null,
        'customer_id' => null,
        'agent_id' => null,
        'voucher_desc' => null,
        'show_expired' => null,
        'changed_only' => null,
        'system_name' => null,
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
