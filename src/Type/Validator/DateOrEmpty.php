<?php
/**
 * Date Validator
 *
 * PHP version 5.3
 *
 * @category  Collmex
 * @package   Validator
 * @author    Marcus Jaschen <mail@marcusjaschen.de>
 * @copyright 2013 Marcus Jaschen
 * @license   http://www.opensource.org/licenses/mit-license MIT License
 * @link      http://github.com/mjaschen/collmex
 */

namespace MarcusJaschen\Collmex\Type\Validator;

/**
 * Date Validator
 *
 * @category Collmex
 * @package  Validator
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     http://github.com/mjaschen/collmex
 */
class DateOrEmpty extends Date implements ValidatorInterface
{
    /**
     * Validates a date value
     *
     * Collmex date representation: `YYYYMMDD`
     *
     * @param mixed $value
     * @param array $options
     *
     * @return bool Validation success
     */
    public function validate($value, $options = array())
    {
        if (empty($value)) {
            return true;
        }

        return parent::validate($value, $options);
    }
}
