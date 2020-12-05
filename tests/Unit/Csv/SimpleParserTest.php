<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Tests\Unit\Csv;

use MarcusJaschen\Collmex\Csv\FormatInterface;
use MarcusJaschen\Collmex\Csv\SimpleParser;
use PHPUnit\Framework\TestCase;

/**
 * Test case.
 */
class SimpleParserTest extends TestCase
{
    /**
     * @var SimpleParser
     */
    protected $parser = null;

    protected function setUp(): void
    {
        $this->parser = new SimpleParser();
    }

    /**
     * @test
     */
    public function parseWithEmptyStringReturnsEmptyArray(): void
    {
        $result = $this->parser->parse('');

        self::assertSame([], $result);
    }

    /**
     * @test
     */
    public function parseWithOneCellReturnsThatCell(): void
    {
        $cellContents = 'Hello world!';

        $result = $this->parser->parse($cellContents);

        self::assertSame([[$cellContents]], $result);
    }

    /**
     * @test
     */
    public function parseSeparatesColumnsWithSemicolon(): void
    {
        $separator = ';';
        $cellContents1 = 'Hello';
        $cellContents2 = 'world';
        $csv = $cellContents1 . $separator . $cellContents2;

        $result = $this->parser->parse($csv);

        self::assertSame([[$cellContents1, $cellContents2]], $result);
    }

    /**
     * @test
     */
    public function parseUsesDoubleQuotesAsEnclosure(): void
    {
        $cellContents = "Hello\nworld";
        $csv = '"' . $cellContents . '"';

        $result = $this->parser->parse($csv);

        self::assertSame([[$cellContents]], $result);
    }

    /**
     * @test
     */
    public function doubleEnclosureEscapesIt(): void
    {
        $enclosure = FormatInterface::ENCLOSURE;
        $cellContents = $enclosure . $enclosure;
        $csv = $enclosure . $cellContents . $enclosure;

        $result = $this->parser->parse($csv);

        self::assertSame([[$enclosure]], $result);
    }

    /**
     * @test
     */
    public function parseReturnsLinesSeparatedByLinefeed(): void
    {
        $line1 = 'There is no spoon.';
        $line2 = 'The cake is a lie';
        $csv = $line1 . "\n" . $line2;

        $result = $this->parser->parse($csv);

        self::assertSame([[$line1], [$line2]], $result);
    }

    /**
     * @test
     */
    public function parseIgnoresOneTrailingLinefeed(): void
    {
        $cellContents = 'Hello world!';
        $csv = $cellContents . "\n";

        $result = $this->parser->parse($csv);

        self::assertSame([[$cellContents]], $result);
    }
}
