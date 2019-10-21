<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Message Type.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
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
        'message_type' => null,
        'message_id' => null,
        'message_text' => null,
        'line' => null,
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
