<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Tests\Unit\Filter;

use MarcusJaschen\Collmex\Filter\FilterInterface;
use MarcusJaschen\Collmex\Filter\Windows1252ToUtf8;
use PHPUnit\Framework\TestCase;

class Windows1252ToUtf8Test extends TestCase
{
    /**
     * @var Windows1252ToUtf8
     */
    protected $subject;

    protected function setUp(): void
    {
        $this->subject = new Windows1252ToUtf8();
    }

    /**
     * @test
     */
    public function implementsFilterInterface(): void
    {
        self::assertInstanceOf(FilterInterface::class, $this->subject);
    }

    /**
     * @test
     */
    public function filterStringKeepsAsciiTextUnchanged(): void
    {
        $text = 'There is no spoon.';

        $result = $this->subject->filterString($text);

        self::assertSame($text, $result);
    }

    /**
     * @test
     */
    public function filterStringConvertsStringEncoding(): void
    {
        $input = \file_get_contents(__DIR__ . '/Fixtures/cp1252.txt');
        $expected = \file_get_contents(__DIR__ . '/Fixtures/utf-8.txt');

        $result = $this->subject->filterString($input);

        self::assertSame($expected, $result);
    }

    /**
     * @test
     */
    public function filterArrayKeepsAsciiTextUnchanged(): void
    {
        $text = ['There is no spoon.', 'The cake is a lie.'];

        $result = $this->subject->filterArray($text);

        self::assertSame($text, $result);
    }

    /**
     * @test
     */
    public function filterArrayConvertsStringEncoding(): void
    {
        $source = \file_get_contents(__DIR__ . '/Fixtures/cp1252.txt');
        $target = \file_get_contents(__DIR__ . '/Fixtures/utf-8.txt');

        $input = [$source, $source];
        $result = $this->subject->filterArray($input);

        $expected = [$target, $target];
        self::assertSame($expected, $result);
    }
}
