<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Tests\Unit\Filter;

use MarcusJaschen\Collmex\Filter\FilterInterface;
use MarcusJaschen\Collmex\Filter\Utf8ToWindows1252;
use PHPUnit\Framework\TestCase;

class Utf8ToWindows1252Test extends TestCase
{
    /**
     * @var Utf8ToWindows1252
     */
    protected $subject;

    protected function setUp(): void
    {
        $this->subject = new Utf8ToWindows1252();
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
        $input = \file_get_contents(__DIR__ . '/Fixtures/utf-8.txt');
        $expected = \file_get_contents(__DIR__ . '/Fixtures/cp1252.txt');

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
        $source = \file_get_contents(__DIR__ . '/Fixtures/utf-8.txt');
        $target = \file_get_contents(__DIR__ . '/Fixtures/cp1252.txt');

        $input = [$source, $source];
        $result = $this->subject->filterArray($input);

        $expected = [$target, $target];
        self::assertSame($expected, $result);
    }
}
