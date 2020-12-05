<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Filter;

/**
 * Filter Interface.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 */
interface FilterInterface
{
    /**
     * @param string $text
     *
     * @return string
     */
    public function filterString(string $text): string;

    /**
     * @param string[] $input
     *
     * @return string[]
     */
    public function filterArray(array $input): array;
}
