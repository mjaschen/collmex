<?php

use MarcusJaschen\Collmex\Csv\SimpleGenerator;

class Issue2Test extends \PHPUnit_Framework_TestCase
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

    /**
     * Tests if CSV generation works in a special case: text contains a
     * backslash followed by a double quote. There exists a PHP bug where
     * fputcsv() creates an invalid CSV string in this case.
     *
     * @see https://bugs.php.net/bug.php?id=43225
     */
    public function testGenerateCsvWithSpecialCharactersWorksAsExpected()
    {
        $data = [
            'CMXINV',
            '-1001338',
            'Some string data here: "quoted text // highlight string \\\\" and "foo" bar',
            'baz'
        ];

        $expected = 'CMXINV;-1001338;"Some string data here: ""quoted text // highlight string \\\\"" and ""foo"" bar";baz' . PHP_EOL;

        $this->assertEquals($expected, $this->generator->generate($data));
    }
}
