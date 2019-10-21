<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Type Interface.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 */
interface TypeInterface
{
    /**
     * Formally validates the type data in $data attribute.
     *
     * @return bool Validation success
     */
    public function validate(): bool;
}
