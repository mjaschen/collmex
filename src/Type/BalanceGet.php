<?php

namespace MarcusJaschen\Collmex\Type;

class BalanceGet extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier'  => 'ACCBAL_GET',
        'client_id'        => null,
        'business_year'    => null,
        'date_to'          => null,
        'account_id'       => null,
        'account_group_id' => null,
        'customer_id'      => null,
        'supplier_id'      => null,
        'cost_center'      => null,
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
