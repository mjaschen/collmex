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
class Date implements ValidatorInterface
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
        if (strlen($value) != 8) {
            return false;
        }

        // 1900-01-01 to 2099-12-31 should be enough for everyone!
        if (! preg_match('/(19|20)\d\d(0[1-9]|1[012])(0[1-9]|[12][0-9]|3[01])/', $value)) {
            return false;
        }

        return true;
    }
}
