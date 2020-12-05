<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Csv;

/**
 * CSV Generator Class.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 */
class SimpleGenerator implements GeneratorInterface
{
    /**
     * Generates a CSV string from given array data.
     *
     * @param array $data
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    public function generate(array $data): string
    {
        $fileHandle = fopen('php://temp', 'w');

        if (!$fileHandle) {
            throw new \RuntimeException('Cannot open temp file handle (php://temp)');
        }

        if (!is_array($data[0])) {
            $data = [$data];
        }

        $tmpPlaceholder = 'MJASCHEN_COLLMEX_WORKAROUND_PHP_BUG_43225_' . time();
        foreach ($data as $line) {
            // workaround for PHP bug 43225: temporarily insert a placeholder
            // between a backslash directly followed by a double-quote (for
            // string field values only)
            array_walk(
                $line,
                static function (&$item) use ($tmpPlaceholder): void {
                    if (!is_string($item)) {
                        return;
                    }
                    $item = preg_replace('/(\\\\+)"/m', '$1' . $tmpPlaceholder . '"', $item);
                }
            );

            fputcsv($fileHandle, $line, FormatInterface::DELIMITER, FormatInterface::ENCLOSURE);
        }

        rewind($fileHandle);
        $csv = stream_get_contents($fileHandle);
        fclose($fileHandle);

        // remove the temporary placeholder from the final CSV string
        $csv = str_replace($tmpPlaceholder, '', $csv);

        return $csv;
    }
}
