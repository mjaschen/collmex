<?php

namespace MarcusJaschen\Collmex\Type;

class AccountBalance extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'ACCBAL',
        'account_id'      => null,
        'account_name'    => null,
        'balance'         => null,
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
