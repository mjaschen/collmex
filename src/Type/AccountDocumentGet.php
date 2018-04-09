<?php

namespace MarcusJaschen\Collmex\Type;

class AccountDocumentGet extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier'   => 'ACCDOC_GET',
        'client_id'         => null,
        'business_year'     => null,
        'booking_id'        => null,
        'account_id'        => null,
        'cost_center'       => null,
        'text'              => null,
        'receipt_date_from' => null,
        'receipt_date_to'   => null,
        'include_canceled'  => null,
        'only_changed'      => null,
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
