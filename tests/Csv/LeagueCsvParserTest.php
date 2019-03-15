<?php

namespace MarcusJaschen\Collmex\Tests\Csv;

use MarcusJaschen\Collmex\Csv\LeagueCsvParser;
use PHPUnit\Framework\TestCase;

class LeagueCsvParserTest extends TestCase
{
    /**
     * @var \MarcusJaschen\Collmex\Csv\SimpleParser
     */
    protected $parser;

    protected function setUp()
    {
        $this->parser = new LeagueCsvParser(';', '"');
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
