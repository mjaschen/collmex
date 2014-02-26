<?php
/**
 * Collmex Message Type
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
 * Collmex Message Type
 *
 * @category Collmex
 * @package  Type
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     http://github.com/mjaschen/collmex
 */
class Message extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = array(
        'type_identifier' => 'MESSAGE',
        'message_type'    => null,
        'message_id'      => null,
        'message_text'    => null,
        'line'            => null,
    );

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