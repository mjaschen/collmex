<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Csv;

/**
 * CSV Generator Interface.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 */
interface GeneratorInterface
{
    /**
     * Generates a CSV string from given array data.
     *
     * @param array $data
     *
     * @return string
     */
    public function generate(array $data): string;
}
