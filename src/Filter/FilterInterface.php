<?php
declare(strict_types=1);

namespace MarcusJaschen\Collmex\Filter;

/**
 * Filter Interface
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     https://github.com/mjaschen/collmex
 */
interface FilterInterface
{
    /**
     * @param string $input
     *
     * @return string
     */
    public function filter(string $input): string;

    /**
     * @param string $text
     *
     * @return string
     */
    public function filterString(string $text): string;

    /**
     * @param array $input
     *
     * @return array
     */
    public function filterArray(array $input): array;
}
