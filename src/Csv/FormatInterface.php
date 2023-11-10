<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Csv;

/**
 * This interface defines the format we use and expect for CSV files.
 */
interface FormatInterface
{
    /**
     * @var string
     */
    public const DELIMITER = ';';

    /**
     * @var string
     */
    public const ENCLOSURE = '"';
}
