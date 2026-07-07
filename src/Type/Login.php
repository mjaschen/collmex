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
 * @property string|null $utf8
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
        'utf8' => null,
    ];

    /**
     * Returns CSV representation, omitting the utf8 field when not set
     * to avoid sending an empty 4th field to Collmex.
     */
    #[\Override]
    public function getCsv(): string
    {
        $data = $this->data;

        if ($data['utf8'] === null || $data['utf8'] === '') {
            unset($data['utf8']);
        }

        return $this->csvGenerator->generate([$data]);
    }

    /**
     * Formally validates the type data in $data attribute.
     *
     * @return bool Validation success
     */
    #[\Override]
    public function validate(): bool
    {
        return !empty($this->data['user']) && !empty($this->data['password']);
    }
}
