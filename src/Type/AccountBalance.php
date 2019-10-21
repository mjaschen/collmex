<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Class AccountBalance.
 *
 * @author  Marcus Jaschen <mjaschen@gmail.com>
 *
 * @property $type_identifier
 * @property $account_id
 * @property $account_name
 * @property $balance
 */
class AccountBalance extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'ACC_BAL',
        'account_id' => null,
        'account_name' => null,
        'balance' => null,
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
