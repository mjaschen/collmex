<?php

namespace MarcusJaschen\Collmex\Tests\Filter;

use MarcusJaschen\Collmex\Filter\Windows1252ToUtf8;
use PHPUnit\Framework\TestCase;

class Windows1252ToUtf8Test extends TestCase
{
    /**
     * @var Windows1252ToUtf8
     */
    protected $filter;

    public function setUp()
    {
        $this->filter = new Windows1252ToUtf8();
    }

    public function tearDown()
    {
        unset($this->filter);
    }

    public function testEncodeString()
    {
        $input    = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '_fixtures' . DIRECTORY_SEPARATOR . 'cp1252.txt');
        $expected = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '_fixtures' . DIRECTORY_SEPARATOR . 'utf-8.txt');

        $this->assertEquals($expected, $this->filter->filterString($input));
    }

    public function testEncodeArray()
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

        $this->assertEquals($expected, $this->filter->filterArray($input));
    }

    public function testEncodeArrayRecursive()
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

        $this->assertEquals($expected, $this->filter->filterArray($input));
    }
}
