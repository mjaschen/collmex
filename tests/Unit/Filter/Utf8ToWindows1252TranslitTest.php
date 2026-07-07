<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Tests\Unit\Filter;

use MarcusJaschen\Collmex\Filter\FilterInterface;
use MarcusJaschen\Collmex\Filter\Utf8ToWindows1252Translit;
use PHPUnit\Framework\TestCase;

class Utf8ToWindows1252TranslitTest extends TestCase
{
    protected Utf8ToWindows1252Translit $subject;

    protected function setUp(): void
    {
        $this->subject = new Utf8ToWindows1252Translit();
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
    public function filterStringConvertsWindows1252CompatibleCharacters(): void
    {
        $input = \file_get_contents(__DIR__ . '/Fixtures/utf-8.txt');
        $expected = \file_get_contents(__DIR__ . '/Fixtures/cp1252.txt');

        $result = $this->subject->filterString($input);

        self::assertSame($expected, $result);
    }

    /**
     * @test
     */
    public function filterStringTransliteratesNonWindows1252Characters(): void
    {
        // ā (a with macron) is not in Windows-1252, should become "a"
        $result = $this->subject->filterString('Kristiāna');

        self::assertSame('Kristiana', $result);
    }

    /**
     * @test
     */
    public function filterStringTransliteratesMixedContent(): void
    {
        // German umlauts (in CP1252) stay intact, ā gets transliterated
        $result = $this->subject->filterString('Müller-Kristiāna');
        $expected = mb_convert_encoding('Müller-Kristiana', 'Windows-1252', 'UTF-8');

        self::assertSame($expected, $result);
    }

    /**
     * @test
     */
    public function filterStringHandlesEmptyString(): void
    {
        $result = $this->subject->filterString('');

        self::assertSame('', $result);
    }

    /**
     * @test
     */
    public function filterStringHandlesUntranslieterableCharacters(): void
    {
        // CJK characters cannot be transliterated to Latin, should not throw
        $result = $this->subject->filterString('Test 中文 Ende');

        // Result should contain "Test" and "Ende", CJK replaced with fallback
        self::assertStringContainsString('Test', $result);
        self::assertStringContainsString('Ende', $result);
    }

    /**
     * @test
     */
    public function filterArrayTransliteratesValues(): void
    {
        $input = ['Kristiāna', 'Müller'];
        $result = $this->subject->filterArray($input);

        self::assertSame('Kristiana', $result[0]);
        self::assertSame(
            mb_convert_encoding('Müller', 'Windows-1252', 'UTF-8'),
            $result[1]
        );
    }
}
