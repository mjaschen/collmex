<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Tests\Unit\Filter;

use MarcusJaschen\Collmex\Filter\Utf8ToWindows1252;
use PHPUnit\Framework\TestCase;

class Utf8ToWindows1252Test extends TestCase
{
    /**
     * @var Utf8ToWindows1252
     */
    protected $filter;

    protected function setUp(): void
    {
        $this->filter = new Utf8ToWindows1252();
    }

    /**
     * @test
     */
    public function encodeString(): void
    {
        $input = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '_fixtures' . DIRECTORY_SEPARATOR . 'utf-8.txt');
        $expected = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '_fixtures' . DIRECTORY_SEPARATOR . 'cp1252.txt');

        self::assertSame($expected, $this->filter->filterString($input));
    }

    /**
     * @test
     */
    public function encodeArray(): void
    {
        $source = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '_fixtures' . DIRECTORY_SEPARATOR . 'utf-8.txt');
        $target = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '_fixtures' . DIRECTORY_SEPARATOR . 'cp1252.txt');

        $input = [
            $source,
            $source,
        ];

        $expected = [
            $target,
            $target,
        ];

        self::assertSame($expected, $this->filter->filterArray($input));
    }

    /**
     * @test
     */
    public function encodeArrayRecursive(): void
    {
        $source = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '_fixtures' . DIRECTORY_SEPARATOR . 'utf-8.txt');
        $target = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '_fixtures' . DIRECTORY_SEPARATOR . 'cp1252.txt');

        $input = [
            [
                $source,
            ],
            $source,
        ];

        $expected = [
            [
                $target,
            ],
            $target,
        ];

        self::assertSame($expected, $this->filter->filterArray($input));
    }
}
