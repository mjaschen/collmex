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
    public function filterString(string $text): string;

    /**
     * @param array<array-key, array<array-key, string>|string> $data
     */
    public function filterArray(array $data): array;
}
