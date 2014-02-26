<?php
/**
 * Collmex Login Type
 *
 * PHP version 5.3
 *
 * @category  Collmex
 * @package   Type
 * @author    Marcus Jaschen <mail@marcusjaschen.de>
 * @copyright 2013 Marcus Jaschen
 * @license   http://www.opensource.org/licenses/mit-license MIT License
 * @link      http://github.com/mjaschen/collmex
 */

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Login Type
 *
 * @category Collmex
 * @package  Type
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     http://github.com/mjaschen/collmex
 */
class Login extends AbstractType implements TypeInterface
{
    protected $template = array(
        'type_identifier' => 'LOGIN',
        'user'            => null,
        'password'        => null,
    );

    /**
     * Formally validates the type data in $data attribute.
     *
     * @return bool Validation success
     */
    public function validate()
    {
        return ! empty($this->data['user']) && ! empty($this->data['password']);
    }
}