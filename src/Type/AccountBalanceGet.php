<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Class AccountBalanceGet.
 *
 * @author  Marcus Jaschen <mjaschen@gmail.com>
 *
 * @property $type_identifier
 * @property $client_id
 * @property $business_year
 * @property $date_to
 * @property $account_id
 * @property $account_group_id
 * @property $customer_id
 * @property $supplier_id
 * @property $cost_center
 */
class AccountBalanceGet extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'ACCBAL_GET',
        'client_id' => null,
        'business_year' => null,
        'date_to' => null,
        'account_id' => null,
        'account_group_id' => null,
        'customer_id' => null,
        'supplier_id' => null,
        'cost_center' => null,
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
