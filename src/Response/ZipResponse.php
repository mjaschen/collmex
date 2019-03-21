<?php
declare(strict_types=1);

namespace MarcusJaschen\Collmex\Response;

use MarcusJaschen\Collmex\Csv\ParserInterface;
use MarcusJaschen\Collmex\Response\Exception\InvalidZipFileException;
use Symfony\Component\Finder\Finder;

/**
 * Collmex ZIP Response Class.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 */
class ZipResponse implements ResponseInterface
{
    /**
     * @var string
     */
    protected $responseBody;

    /**
     * @var ParserInterface
     */
    protected $responseParser;

    /**
     * @var string
     */
    protected $extractDirectory;

    /**
     * @param ParserInterface $responseParser
     * @param string $responseBody
     *
     * @throws \MarcusJaschen\Collmex\Response\Exception\InvalidZipFileException
     */
    public function __construct(ParserInterface $responseParser, string $responseBody)
    {
        $this->responseBody = $responseBody;
        $this->responseParser = $responseParser;

        $this->extractFiles();
    }

    /**
     * Returns an iterator of files matching the given file extension filter.
     *
     * @param string $type
     *
     * @return Finder
     *
     * @throws \InvalidArgumentException
     */
    public function getFilesByType(string $type = 'pdf'): Finder
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
     * Returns the CsvResponse instance for the (first) included CSV file.
     *
     * @return CsvResponse|null
     *
     * @throws \InvalidArgumentException
     */
    public function getCsvResponse(): ?CsvResponse
    {
        $iterator = $this->getFilesByType('csv');

        foreach ($iterator as $file) {
            $csv = file_get_contents($file);

            return new CsvResponse($this->responseParser, $csv);
        }

        return null;
    }

    /**
     * @return void
     *
     * @throws InvalidZipFileException
     */
    protected function extractFiles(): void
    {
        $tmpFilename = tempnam(sys_get_temp_dir(), 'collmexphp_');
        file_put_contents($tmpFilename, $this->responseBody);

        $this->extractDirectory = dirname($tmpFilename) . DIRECTORY_SEPARATOR
                                  . 'collmexphp_extracted_' . basename($tmpFilename);

        $zip = new \ZipArchive();

        if (!$zip->open($tmpFilename)) {
            throw new InvalidZipFileException('Cannot open ZIP archive ' . $tmpFilename);
        }

        $zip->extractTo($this->extractDirectory);
        $zip->close();
    }
}
