<?php

namespace MarcusJaschen\Collmex\Csv;

/**
 * CSV Generator Interface
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     https://github.com/mjaschen/collmex
 */
interface GeneratorInterface
{
    /**
     * Generates a CSV string from given array data
     *
     * @param array $data
     *
     * @return string
     */
    public function generate(array $data): string;
}
