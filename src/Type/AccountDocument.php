<?php

namespace MarcusJaschen\Collmex\Type;

class AccountDocument extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier'           => 'ACCDOC',
        'client_id'                 => null,
        'business_year'             => null,
        'booking_id'                => null,
        'document_date'             => null,
        'booked_on'                 => null,
        'booking_text'              => null,
        'position'                  => null,
        'account_id'                => null,
        'account_name'              => null,
        'debit_or_credit'           => null,
        'amount'                    => null,
        'customer_id'               => null,
        'customer_name'             => null,
        'supplier_id'               => null,
        'supplier_name'             => null,
        'attachment_id'             => null,
        'attachment_name'           => null,
        'canceled_booking_id'       => null,
        'cost_centre'               => null,
        'invoice_id'                => null,
        'sales_order_id'            => null,
        'travel_id'                 => null,
        'assigned_id'               => null,
        'assigned_business_year'    => null,
        'assigned_position'         => null,
        'document_id'               => null,
        'receipt_date'              => null,
        'internal_memo'             => null,
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