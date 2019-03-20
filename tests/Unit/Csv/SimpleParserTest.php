<?php

namespace MarcusJaschen\Collmex\Tests\Unit\Csv;

use PHPUnit\Framework\TestCase;

class SimpleParserTest extends TestCase
{
    /**
     * @var \MarcusJaschen\Collmex\Csv\SimpleParser
     */
    protected $parser;

    protected function setUp(): void
    {
        $this->parser = new \MarcusJaschen\Collmex\Csv\SimpleParser(';', '"');
    }

    public function testParseOneLine(): void
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

        $this->assertSame($expected, $data);
    }

    public function testParseOneLineWithNewline(): void
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

        $this->assertSame($expected, $data);
    }

    public function testParseMultipleLines(): void
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
                '100',
                '1',
            ],
        ];

        $this->assertSame($expected, $data);
    }
}
