<?php
/**
 * Collmex Subscription Type
 *
 * @author    Marcus Jaschen <mail@marcusjaschen.de>
 * @license   http://www.opensource.org/licenses/mit-license MIT License
 * @link      https://github.com/mjaschen/collmex
 */

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Subscription Type
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     https://github.com/mjaschen/collmex
 */
class Subscription extends AbstractType implements TypeInterface
{
    const INTERVAL_YEAR              = 0;
    const INTERVAL_HALF_YEAR         = 1;
    const INTERVAL_QUARTER           = 2;
    const INTERVAL_MONTH             = 3;
    const INTERVAL_YEAR_PREPAID      = 4;
    const INTERVAL_HALF_YEAR_PREPAID = 5;
    const INTERVAL_QUARTER_PREPAID   = 6;
    const INTERVAL_MONTH_PREPAID     = 7;

    /**
     * Type data template
     *
     * @var array
     */
    protected $template = [
        'type_identifier'     => 'CMXABO',
        'customer_id'         => null,
        'client_id'           => null,
        'valid_from'          => null,
        'valid_to'            => null,
        'product_id'          => null,
        'product_description' => null,
        'price'               => null,
        'interval'            => null,
        'next_invoice'        => null,
    ];

    /**
     * Formally validates the type data in $data attribute.
     *
     * @return bool Validation success
     */
    public function validate()
    {
        $dateOrEmptyValidator = new \MarcusJaschen\Collmex\Type\Validator\DateOrEmpty();

        if (! $dateOrEmptyValidator->validate($this->data['valid_from'])) {
            $this->validationErrors['valid_from'] = true;
        }
        if (! $dateOrEmptyValidator->validate($this->data['valid_to'])) {
            $this->validationErrors['valid_to'] = true;
        }

        $intervalValidator = new \MarcusJaschen\Collmex\Type\Validator\TimeInterval();

        if (! $intervalValidator->validate($this->data['interval'])) {
            $this->validationErrors['interval'] = true;
        }

        return null === $this->validationErrors;
    }
}
