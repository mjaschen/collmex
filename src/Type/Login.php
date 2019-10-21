<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Login Type.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 *
 * @property $type_identifier
 * @property $user
 * @property $password
 */
class Login extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'LOGIN',
        'user' => null,
        'password' => null,
    ];

    /**
     * Formally validates the type data in $data attribute.
     *
     * @return bool Validation success
     */
    public function validate(): bool
    {
        return !empty($this->data['user']) && !empty($this->data['password']);
    }
}
