<?php

namespace MarcusJaschen\Collmex\Csv;

use MarcusJaschen\Collmex\Csv\SimpleGenerator;

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
        $data = array(
            array(
                'MESSAGE',
                'E',
                '11111',
                'Error Message',
                '123',
            ),
        );

        $expected = 'MESSAGE;E;11111;"Error Message";123' . "\n";

        $this->assertEquals($expected, $this->generator->generate($data));
    }

    public function testGenerateCsvMultipleLines()
    {
        $data = array(
            array(
                'TEST',
                '1',
                'a',
            ),
            array(
                'MESSAGE',
                'E',
                '11111',
                'Error Message',
                '123',
            ),
        );

        $expected = 'TEST;1;a' . "\n"
            . 'MESSAGE;E;11111;"Error Message";123' . "\n";

        $this->assertEquals($expected, $this->generator->generate($data));
    }

    public function testGenerateCsvOneLineWithoutOuterArray()
    {
        $data = array(
            'MESSAGE',
            'E',
            '11111',
            'Error Message',
            '123',
        );

        $expected = 'MESSAGE;E;11111;"Error Message";123' . "\n";

        $this->assertEquals($expected, $this->generator->generate($data));
    }
}