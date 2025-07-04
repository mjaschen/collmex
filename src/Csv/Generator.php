<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Csv;

use RuntimeException;

class Generator
{
    private const PLACEHOLDER_FPUTCSV_BUG = 'MJASCHEN_COLLMEX_WORKAROUND_PHP_BUG_43225';

    /**
     * Generates a CSV string from given array data; detects automatically
     * whether the data contains a single line or multiple lines.
     *
     * @throws RuntimeException
     */
    public function generate(array $data): string
    {
        if (!is_array($data[0])) {
            return $this->generateFromSingleLine($data);
        }

        return $this->generateFromMultipleLines($data);
    }

    public function generateFromSingleLine(array $line): string
    {
        return $this->createCsvString(
            /** @param resource $fileHandle */
            function ($fileHandle) use ($line): void {
                fputcsv(
                    $fileHandle,
                    $this->insertSpecialPlaceholder($line),
                    FormatInterface::DELIMITER,
                    FormatInterface::ENCLOSURE,
                    '',
                );
            }
        );
    }

    public function generateFromMultipleLines(array $lines): string
    {
        return $this->createCsvString(
            /** @param resource $fileHandle */
            function ($fileHandle) use ($lines): void {
                foreach ($lines as $line) {
                    fputcsv(
                        $fileHandle,
                        $this->insertSpecialPlaceholder($line),
                        FormatInterface::DELIMITER,
                        FormatInterface::ENCLOSURE,
                        '',
                    );
                }
            }
        );
    }

    /**
     * @throws \RuntimeException
     */
    private function createCsvString(callable $csvCreator): string
    {
        $fileHandle = fopen('php://temp', 'wb');

        if (!$fileHandle) {
            throw new RuntimeException('Cannot open temp file handle (php://temp)', 5_529_946_737);
        }

        $csvCreator($fileHandle);

        rewind($fileHandle);
        $csv = stream_get_contents($fileHandle);
        fclose($fileHandle);

        if ($csv === false) {
            throw new \RuntimeException('Cannot get stream contents (php://temp)', 5693338927);
        }

        // remove the temporary placeholder from the final CSV string
        return str_replace(self::PLACEHOLDER_FPUTCSV_BUG, '', $csv);
    }

    private function insertSpecialPlaceholder(array $csvLine): array
    {
        return array_map(
            /** @psalm-suppress MissingClosureParamType */
            static function ($item) {
                if (!is_string($item)) {
                    return $item;
                }

                return preg_replace('/(\\\\+)"/m', '$1' . self::PLACEHOLDER_FPUTCSV_BUG . '"', $item);
            },
            $csvLine
        );
    }
}
