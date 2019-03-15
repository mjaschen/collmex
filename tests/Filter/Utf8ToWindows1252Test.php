<?php

namespace MarcusJaschen\Collmex\Tests\Filter;

use MarcusJaschen\Collmex\Filter\Utf8ToWindows1252;
use PHPUnit\Framework\TestCase;

class Utf8ToWindows1252Test extends TestCase
{
    /**
     * @var Utf8ToWindows1252
     */
    protected $filter;

    protected function setUp()
    {
        $this->filter = new Utf8ToWindows1252();
    }

    public function testEncodeString()
    {
        $input = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '_fixtures' . DIRECTORY_SEPARATOR . 'utf-8.txt');
        $expected = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '_fixtures' . DIRECTORY_SEPARATOR . 'cp1252.txt');

        $this->assertEquals($expected, $this->filter->filterString($input));
    }

    public function testEncodeArray()
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

        $this->assertEquals($expected, $this->filter->filterArray($input));
    }

    public function testEncodeArrayRecursive()
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

        $this->assertEquals($expected, $this->filter->filterArray($input));
    }
}
