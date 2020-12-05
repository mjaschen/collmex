<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Tests\Integration\Response;

use MarcusJaschen\Collmex\Csv\SimpleParser;
use MarcusJaschen\Collmex\Response\CsvResponse;
use MarcusJaschen\Collmex\Response\Exception\InvalidZipFileException;
use MarcusJaschen\Collmex\Response\Exception\InvalidZipResponseException;
use MarcusJaschen\Collmex\Response\ResponseInterface;
use MarcusJaschen\Collmex\Response\ZipResponse;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Finder\Finder;

/**
 * Test case.
 *
 * @covers \MarcusJaschen\Collmex\Response\ZipResponse
 */
class ZipResponseTest extends TestCase
{
    /**
     * @var SimpleParser
     */
    private $parser = null;

    /**
     * @var string
     */
    private $zipPath = '';

    protected function setUp(): void
    {
        $this->parser = new SimpleParser();

        $this->zipPath = \tempnam(\sys_get_temp_dir(), 'TestingZipResponse') . '.zip';
    }

    protected function tearDown(): void
    {
        if (\file_exists($this->zipPath)) {
            \unlink($this->zipPath);
        }
    }

    /**
     * Creates a ZIP file that contains a file with the given file name and contents.
     *
     * @param string $fileName
     * @param string $contents
     *
     * @return string the ZIP file contents
     *
     * @throws \RuntimeException
     */
    private function createZipWithFile(string $fileName, string $contents): string
    {
        $zip = new \ZipArchive();
        $openStatus = $zip->open($this->zipPath, \ZipArchive::CREATE | \ZipArchive::EXCL);
        if (!$openStatus) {
            throw new \RuntimeException('Could not open ZIP.', 1557497112);
        }
        $zip->addFromString($fileName, $contents);
        $zip->close();

        return \file_get_contents($this->zipPath);
    }

    /**
     * @test
     */
    public function implementsResponseInterface(): void
    {
        $subject = new ZipResponse($this->parser, '');

        self::assertInstanceOf(ResponseInterface::class, $subject);
    }

    /**
     * @test
     *
     * @doesNotPerformAssertions
     */
    public function constructorWithEmptyZipResponseBodyNotThrowsException(): void
    {
        $responseBody = '';
        new ZipResponse($this->parser, $responseBody);
    }

    /**
     * @test
     */
    public function constructorWithInvalidZipResponseBodyThrowsException(): void
    {
        $this->expectException(InvalidZipFileException::class);

        $responseBody = 'The cake is a lie.';
        new ZipResponse($this->parser, $responseBody);
    }

    /**
     * @test
     */
    public function getFilesByTypeReturnsFinder(): void
    {
        $responseBody = '';
        $subject = new ZipResponse($this->parser, $responseBody);

        $result = $subject->getFilesByType();

        self::assertInstanceOf(Finder::class, $result);
    }

    /**
     * @test
     */
    public function getFilesByTypeForEmptyZipResponseBodyReturnsNoResults(): void
    {
        $responseBody = '';
        $subject = new ZipResponse($this->parser, $responseBody);

        $result = $subject->getFilesByType();

        self::assertFalse($result->hasResults());
    }

    /**
     * @test
     */
    public function getFilesByTypeForOneFileZipResponseBodyReturnsFinderWithMatchingFile(): void
    {
        $fileName = 'test.txt';
        $responseBody = $this->createZipWithFile($fileName, 'There is no spoon.');
        $subject = new ZipResponse($this->parser, $responseBody);

        $result = $subject->getFilesByType('txt');

        self::assertTrue($result->hasResults());
    }

    /**
     * @test
     */
    public function getFilesByTypeIgnoresNonMatchingFiles(): void
    {
        $fileName = 'test.txt';
        $responseBody = $this->createZipWithFile($fileName, 'There is no spoon.');
        $subject = new ZipResponse($this->parser, $responseBody);

        $result = $subject->getFilesByType('png');

        self::assertFalse($result->hasResults());
    }

    /**
     * @test
     */
    public function getFilesByTypeByDefaultFindsPdfFiles(): void
    {
        $fileName = 'test.pdf';
        $responseBody = $this->createZipWithFile($fileName, 'There is no spoon.');
        $subject = new ZipResponse($this->parser, $responseBody);

        $result = $subject->getFilesByType();

        self::assertTrue($result->hasResults());
    }

    /**
     * @test
     */
    public function getCsvResponseForZipWithoutCsvFilesThrowsException(): void
    {
        $this->expectException(InvalidZipResponseException::class);

        $fileName = 'test.txt';
        $responseBody = $this->createZipWithFile($fileName, 'There is no spoon.');
        $subject = new ZipResponse($this->parser, $responseBody);

        $result = $subject->getCsvResponse();

        self::assertNull($result);
    }

    /**
     * @test
     */
    public function getCsvResponseForZipWithCsvFilesReturnsCsvResponseWithCsvContents(): void
    {
        $fileName = 'test.csv';
        $responseBody = $this->createZipWithFile($fileName, 'There is no spoon.');
        $subject = new ZipResponse($this->parser, $responseBody);

        $result = $subject->getCsvResponse();

        self::assertInstanceOf(CsvResponse::class, $result);
    }
}
