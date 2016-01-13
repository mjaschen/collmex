<?php

namespace MarcusJaschen\Collmex\Csv;

class SimpleGeneratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SimpleGenerator
     */
    protected $generator;

    public function setUp()
    {
        $this->generator = new SimpleGenerator(';', '"');
    }

    public function tearDown()
    {
        unset($this->generator);
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

        $this->assertEquals($expected, $this->generator->generate($data));
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

        $this->assertEquals($expected, $this->generator->generate($data));
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

        $this->assertEquals($expected, $this->generator->generate($data));
    }
}
