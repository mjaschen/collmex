<?php

namespace MarcusJaschen\Collmex\Filter;

class Utf8ToWindows1252Test extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \MarcusJaschen\Collmex\Filter\Utf8ToWindows1252
     */
    protected $filter;

    public function setUp()
    {
        $this->filter = new \MarcusJaschen\Collmex\Filter\Utf8ToWindows1252();
    }

    public function tearDown()
    {
        unset($this->filter);
    }

    public function testEncodeString()
    {
        $input = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '_fixtures' . DIRECTORY_SEPARATOR . 'utf-8.txt');
        $expected = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '_fixtures' . DIRECTORY_SEPARATOR . 'cp1252.txt');

        $this->assertEquals($expected, $this->filter->filter($input));
    }

    public function testEncodeArray()
    {
        $source = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '_fixtures' . DIRECTORY_SEPARATOR . 'utf-8.txt');
        $target = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '_fixtures' . DIRECTORY_SEPARATOR . 'cp1252.txt');

        $input = array(
            $source,
            $source,
        );

        $expected = array(
            $target,
            $target,
        );

        $this->assertEquals($expected, $this->filter->filter($input));
    }

    public function testEncodeArrayRecursive()
    {
        $source = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '_fixtures' . DIRECTORY_SEPARATOR . 'utf-8.txt');
        $target = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '_fixtures' . DIRECTORY_SEPARATOR . 'cp1252.txt');

        $input = array(
            array(
                $source,
            ),
            $source,
        );

        $expected = array(
            array(
                $target,
            ),
            $target,
        );

        $this->assertEquals($expected, $this->filter->filter($input));
    }
}
