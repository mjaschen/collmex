<?php
namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Message Type
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     https://github.com/mjaschen/collmex
 *
 * @property $type_identifier
 * @property $message_type
 * @property $message_id
 * @property $message_text
 * @property $line
 */
class Message extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'MESSAGE',
        'message_type'    => null,
        'message_id'      => null,
        'message_text'    => null,
        'line'            => null,
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
