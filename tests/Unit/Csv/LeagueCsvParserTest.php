<?php
declare(strict_types=1);

namespace MarcusJaschen\Collmex\Tests\Unit\Csv;

use MarcusJaschen\Collmex\Csv\LeagueCsvParser;
use PHPUnit\Framework\TestCase;

class LeagueCsvParserTest extends TestCase
{
    /**
     * @var \MarcusJaschen\Collmex\Csv\SimpleParser
     */
    protected $parser;

    protected function setUp(): void
    {
        $this->parser = new LeagueCsvParser(';', '"');
    }

    /**
     * @test
     */
    public function parseOneLine(): void
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

        self::assertSame($expected, $data);
    }

    /**
     * @test
     */
    public function parseOneLineWithNewline(): void
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

        self::assertSame($expected, $data);
    }

    /**
     * @test
     */
    public function parseMultipleLines(): void
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

        self::assertSame($expected, $data);
    }
}
