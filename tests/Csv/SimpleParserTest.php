<?php

namespace MarcusJaschen\Collmex\Tests\Csv;

class SimpleParserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \MarcusJaschen\Collmex\Csv\SimpleParser
     */
    protected $parser;

    protected function setUp()
    {
        $this->parser = new \MarcusJaschen\Collmex\Csv\SimpleParser(';', '"');
    }

    public function testParseOneLine()
    {
        $csv = 'Typkennung;Rechnung Nr;Pos';

        $data = $this->parser->parse($csv);

        $expected = [
            [
                'Typkennung',
                'Rechnung Nr',
                'Pos',
            ],
        ];

        $this->assertEquals($expected, $data);
    }

    public function testParseOneLineWithNewline()
    {
        $csv = "Typkennung;Rechnung Nr;Pos\n";

        $data = $this->parser->parse($csv);

        $expected = [
            [
                'Typkennung',
                'Rechnung Nr',
                'Pos',
            ],
        ];

        $this->assertEquals($expected, $data);
    }

    public function testParseMultipleLines()
    {
        $csv = "Typkennung;Rechnung Nr;Pos\nCMXINV;100;1";

        $data = $this->parser->parse($csv);

        $expected = [
            [
                'Typkennung',
                'Rechnung Nr',
                'Pos',
            ],
            [
                'CMXINV',
                100,
                1,
            ],
        ];

        $this->assertEquals($expected, $data);
    }
}
