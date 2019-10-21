<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Tests\Unit\Csv;

use MarcusJaschen\Collmex\Csv\SimpleGenerator;
use PHPUnit\Framework\TestCase;

class SimpleGeneratorTest extends TestCase
{
    /**
     * @var SimpleGenerator
     */
    protected $generator;

    protected function setUp(): void
    {
        $this->generator = new SimpleGenerator();
    }

    /**
     * @test
     */
    public function generateCsvOneLine(): void
    {
        $data = [
            [
                'MESSAGE',
                'E',
                '11111',
                'Error Message',
                '123',
            ],
        ];

        $expected = 'MESSAGE;E;11111;"Error Message";123' . "\n";

        self::assertSame($expected, $this->generator->generate($data));
    }

    /**
     * @test
     */
    public function generateCsvMultipleLines(): void
    {
        $data = [
            [
                'TEST',
                '1',
                'a',
            ],
            [
                'MESSAGE',
                'E',
                '11111',
                'Error Message',
                '123',
            ],
        ];

        $expected = 'TEST;1;a' . "\n"
            . 'MESSAGE;E;11111;"Error Message";123' . "\n";

        self::assertSame($expected, $this->generator->generate($data));
    }

    /**
     * @test
     */
    public function generateCsvOneLineWithoutOuterArray(): void
    {
        $data = [
            'MESSAGE',
            'E',
            '11111',
            'Error Message',
            '123',
        ];

        $expected = 'MESSAGE;E;11111;"Error Message";123' . "\n";

        self::assertSame($expected, $this->generator->generate($data));
    }

    /**
     * @test
     *
     * Tests if CSV generation works in a special case: text contains a
     * backslash followed by a double quote. There exists a PHP bug where
     * fputcsv() creates an invalid CSV string in this case.
     *
     * @see https://bugs.php.net/bug.php?id=43225
     */
    public function generateCsvWithSpecialCharactersWorksAsExpected(): void
    {
        $data = [
            'CMXINV',
            '-1001338',
            'Provision Bikemarkt-Verkauf 279679: "Endura MTR Baggy Short // SALE \\\\" an "bebetz" am 1.1.2016',
        ];

        $expected = 'CMXINV;-1001338;"Provision Bikemarkt-Verkauf 279679: ' .
            '""Endura MTR Baggy Short // SALE \\\\"" an ""bebetz"" am 1.1.2016"' . PHP_EOL;

        self::assertSame($expected, $this->generator->generate($data));
    }
}
