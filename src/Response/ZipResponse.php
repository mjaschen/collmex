<?php
/**
 * Collmex ZIP Response Class
 *
 * PHP version 5.3
 *
 * @category  Collmex
 * @package   Response
 * @author    Marcus Jaschen <mail@marcusjaschen.de>
 * @copyright 1999-2013 MTB-News.de
 * @license   http://www.opensource.org/licenses/mit-license MIT License
 * @link      http://www.mtb-news.de/
 */

namespace MarcusJaschen\Collmex\Response;

use MarcusJaschen\Collmex\Csv\ParserInterface;
use Symfony\Component\Finder\Finder;

/**
 * Collmex ZIP Response Class
 *
 * @category Collmex
 * @package  Response
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     http://www.mtb-news.de/
 */
class ZipResponse
{
    /**
     * @var string
     */
    protected $reponseBody;

    /**
     * @var \MarcusJaschen\Collmex\Csv\ParserInterface
     */
    protected $responseParser;

    /**
     * @var string
     */
    protected $extractDirectory;

    /**
     * @param \MarcusJaschen\Collmex\Csv\ParserInterface $responseParser
     * @param string $reponseBody
     */
    public function __construct(ParserInterface $responseParser, $reponseBody)
    {
        $this->reponseBody = $reponseBody;
        $this->responseParser = $responseParser;

        $this->extractFiles();
    }

    /**
     * Returns an iterator of files matching the given file extension filter
     *
     * @param string $type
     * @return Finder
     */
    public function getFilesByType($type = "pdf")
    {
        $finder = new Finder();

        $iterator = $finder
            ->files()
            ->name("*.{$type}")
            ->depth(0)
            ->in($this->extractDirectory);

        return $iterator;
    }

    /**
     * Returns the CsvResponse instance for the (first) included CSV file
     *
     * @return CsvResponse
     */
    public function getCsvResponse()
    {
        $finder = new Finder();

        $iterator = $finder
            ->files()
            ->name('*.csv')
            ->depth(0)
            ->in($this->extractDirectory);

        foreach ($iterator as $file) {
            $csv = file_get_contents($file);
            return new CsvResponse($this->responseParser, $csv);
        }
    }

    /**
     *
     */
    protected function extractFiles()
    {
        $tmpFilename = tempnam(sys_get_temp_dir(), 'billing_');
        file_put_contents($tmpFilename, $this->reponseBody);

        $this->extractDirectory = dirname($tmpFilename) . DIRECTORY_SEPARATOR . 'extracted_' . basename($tmpFilename);

        $zip = new \ZipArchive;

        if (! $zip->open($tmpFilename)) {
            throw new Exception\InvalidZipFileException("Cannot open ZIP archive " . $tmpFilename);
        }

        $zip->extractTo($this->extractDirectory);
        $zip->close();
    }
}