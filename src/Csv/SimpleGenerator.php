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

        foreach ($data as $line) {
            fputcsv($fileHandle, $line, $this->delimiter, $this->enclosure);
        }

        rewind($fileHandle);
        $csv = stream_get_contents($fileHandle);
        fclose($fileHandle);

        return $csv;
    }
}
