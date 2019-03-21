<?php
declare(strict_types=1);

namespace MarcusJaschen\Collmex\Tests\Unit\Filter;

use MarcusJaschen\Collmex\Filter\Windows1252ToUtf8;
use PHPUnit\Framework\TestCase;

class Windows1252ToUtf8Test extends TestCase
{
    /**
     * @var Windows1252ToUtf8
     */
    protected $filter;

    protected function setUp(): void
    {
        $this->filter = new Windows1252ToUtf8();
    }

    public function testEncodeString(): void
    {
        $input = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '_fixtures' . DIRECTORY_SEPARATOR . 'cp1252.txt');
        $expected = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '_fixtures' . DIRECTORY_SEPARATOR . 'utf-8.txt');

        self::assertSame($expected, $this->filter->filterString($input));
    }

    public function testEncodeArray(): void
    {
        $source = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '_fixtures' . DIRECTORY_SEPARATOR . 'cp1252.txt');
        $target = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '_fixtures' . DIRECTORY_SEPARATOR . 'utf-8.txt');

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

    public function testEncodeArrayRecursive(): void
    {
        $source = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '_fixtures' . DIRECTORY_SEPARATOR . 'cp1252.txt');
        $target = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '_fixtures' . DIRECTORY_SEPARATOR . 'utf-8.txt');

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
