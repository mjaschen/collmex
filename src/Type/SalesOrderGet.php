<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Customer Order Get Type.
 *
 * @author   Jörg Wolfgram <joerg.wolfgram@spectrattack.de>
 *
 * @property $type_identifier
 * @property $order_id
 * @property $client_id
 * @property $customer_id
 * @property $order_date_start
 * @property $order_date_end
 * @property $customer_order_id
 * @property $format
 * @property $only_changed
 * @property $system_name
 * @property $only_created_by_system
 * @property $letter_paper
 */
class SalesOrderGet extends AbstractType implements TypeInterface
{
    /**
     * @var int
     */
    public const FORMAT_CSV = 0;
    /**
     * @var int
     */
    public const FORMAT_ZIP = 1;

    /**
     * useable for 'only_changed' and 'only_created_by_system'.
     *
     * @var int
     */
    public const FILTER_ON = 1;
    /**
     * useable for 'only_changed' and 'only_created_by_system'.
     *
     * @var int
     */
    public const FILTER_OFF = 0;

    /**
     * @var int
     */
    public const WITH_LETTER_PAPER = 0;
    /**
     * @var int
     */
    public const NO_LETTER_PAPER = 1;

    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'SALES_ORDER_GET',
        'order_id' => null,
        'client_id' => null,
        'customer_id' => null,
        'order_date_start' => null,
        'order_date_end' => null,
        'customer_order_id' => null,
        'format' => null,
        'only_changed' => null,
        // 10
        'system_name' => null,
        'only_created_by_system' => null,
        'letter_paper' => null,
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
