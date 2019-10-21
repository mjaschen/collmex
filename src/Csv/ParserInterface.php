<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Csv;

/**
 * CSV Parser Interface.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 */
interface ParserInterface
{
    /**
     * @param string $csv one or multiple lines of CSV data
     *
     * @return array
     */
    public function parse(string $csv): array;
}
