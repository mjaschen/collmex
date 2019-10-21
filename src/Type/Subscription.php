<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

use MarcusJaschen\Collmex\Type\Validator\DateOrEmpty as DateOrEmptyValidator;
use MarcusJaschen\Collmex\Type\Validator\TimeInterval as TimeIntervalValidator;

/**
 * Collmex Subscription Type.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 *
 * @property $type_identifier
 * @property $customer_id
 * @property $client_id
 * @property $valid_from
 * @property $valid_to
 * @property $product_id
 * @property $product_description
 * @property $price
 * @property $interval
 * @property $next_invoice
 */
class Subscription extends AbstractType implements TypeInterface
{
    /**
     * @var int
     */
    public const INTERVAL_YEAR = 0;
    /**
     * @var int
     */
    public const INTERVAL_HALF_YEAR = 1;
    /**
     * @var int
     */
    public const INTERVAL_QUARTER = 2;
    /**
     * @var int
     */
    public const INTERVAL_MONTH = 3;
    /**
     * @var int
     */
    public const INTERVAL_YEAR_PREPAID = 4;
    /**
     * @var int
     */
    public const INTERVAL_HALF_YEAR_PREPAID = 5;
    /**
     * @var int
     */
    public const INTERVAL_QUARTER_PREPAID = 6;
    /**
     * @var int
     */
    public const INTERVAL_MONTH_PREPAID = 7;

    /**
     * Type data template.
     *
     * @var array
     */
    protected $template = [
        'type_identifier' => 'CMXABO',
        'customer_id' => null,
        'client_id' => null,
        'valid_from' => null,
        'valid_to' => null,
        'product_id' => null,
        'product_description' => null,
        'price' => null,
        'interval' => null,
        'next_invoice' => null,
    ];

    /**
     * Formally validates the type data in $data attribute.
     *
     * @return bool Validation success
     */
    public function validate(): bool
    {
        $dateOrEmptyValidator = new DateOrEmptyValidator();

        if (!$dateOrEmptyValidator->validate($this->data['valid_from'])) {
            $this->validationErrors['valid_from'] = true;
        }
        if (!$dateOrEmptyValidator->validate($this->data['valid_to'])) {
            $this->validationErrors['valid_to'] = true;
        }

        $intervalValidator = new TimeIntervalValidator();

        if (!$intervalValidator->validate($this->data['interval'])) {
            $this->validationErrors['interval'] = true;
        }

        return null === $this->validationErrors;
    }
}
