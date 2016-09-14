<?php
/**
 * CSV Generator Class
 *
 * @author    Marcus Jaschen <mail@marcusjaschen.de>
 * @license   http://www.opensource.org/licenses/mit-license MIT License
 * @link      https://github.com/mjaschen/collmex
 */

namespace MarcusJaschen\Collmex\Csv;

/**
 * CSV Generator Class
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     https://github.com/mjaschen/collmex
 */
class SimpleGenerator implements GeneratorInterface
{
    /**
     * @var string
     */
    protected $delimiter;

    /**
     * @var string
     */
    protected $enclosure;

    /**
     * @param string $delimiter
     * @param string $enclosure
     */
    public function __construct($delimiter = ';', $enclosure = '"')
    {
        $this->delimiter = $delimiter;
        $this->enclosure = $enclosure;
    }

    /**
     * Generates a CSV string from given array data
     *
     * @param array $data
     *
     * @throws \RuntimeException
     *
     * @return string
     */
    public function generate(array $data)
    {
        $fileHandle = fopen('php://temp', 'w');

        if (! $fileHandle) {
            throw new \RuntimeException("Cannot open temp file handle (php://temp)");
        }

        if (! is_array($data[0])) {
            $data = [$data];
        }

        $tmpPlaceholder = 'MJASCHEN_COLLMEX_WORKAROUND_PHP_BUG_43225_' . time();
        foreach ($data as $line) {
            // workaround for PHP bug 43225: temporarily insert a placeholder
            // between a backslash directly followed by a double-quote (for
            // string field values only)
            array_walk($line, function (&$item) use ($tmpPlaceholder) {
                if (! is_string($item)) {
                    return;
                }
                $item = preg_replace('/(\\\\+)"/m', '$1' . $tmpPlaceholder . '"', $item);
            });

            fputcsv($fileHandle, $line, $this->delimiter, $this->enclosure);
        }

        rewind($fileHandle);
        $csv = stream_get_contents($fileHandle);
        fclose($fileHandle);

        // remove the temporary placeholder from the final CSV string
        $csv = str_replace($tmpPlaceholder, '', $csv);

        return $csv;
    }
}
