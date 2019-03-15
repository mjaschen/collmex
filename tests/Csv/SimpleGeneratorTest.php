<?php

namespace MarcusJaschen\Collmex\Tests\Csv;

use MarcusJaschen\Collmex\Csv\SimpleGenerator;
use PHPUnit\Framework\TestCase;

class SimpleGeneratorTest extends TestCase
{
    /**
     * @var SimpleGenerator
     */
    protected $generator;

    protected function setUp()
    {
        $this->generator = new SimpleGenerator(';', '"');
    }

    public function testGenerateCsvOneLine()
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

        $this->assertSame($expected, $this->generator->generate($data));
    }

    public function testGenerateCsvMultipleLines()
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

        $this->assertSame($expected, $this->generator->generate($data));
    }

    public function testGenerateCsvOneLineWithoutOuterArray()
    {
        $data = [
            'MESSAGE',
            'E',
            '11111',
            'Error Message',
            '123',
        ];

        $expected = 'MESSAGE;E;11111;"Error Message";123' . "\n";

        $this->assertSame($expected, $this->generator->generate($data));
    }

    /**
     * Tests if CSV generation works in a special case: text contains a
     * backslash followed by a double quote. There exists a PHP bug where
     * fputcsv() creates an invalid CSV string in this case.
     *
     * @see https://bugs.php.net/bug.php?id=43225
     *
     *
     */
    public function testGenerateCsvWithSpecialCharactersWorksAsExpected()
    {
        $data = [
            'CMXINV',
            '-1001338',
            'Provision Bikemarkt-Verkauf 279679: "Endura MTR Baggy Short // SALE \\\\" an "bebetz" am 1.1.2016',
        ];

        $expected = 'CMXINV;-1001338;"Provision Bikemarkt-Verkauf 279679: ' .
            '""Endura MTR Baggy Short // SALE \\\\"" an ""bebetz"" am 1.1.2016"' . PHP_EOL;

        $this->assertSame($expected, $this->generator->generate($data));
    }
}
