<?php

namespace MarcusJaschen\Collmex\Filter;

class Windows1252ToUtf8Test extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \MarcusJaschen\Collmex\Filter\Windows1252ToUtf8
     */
    protected $filter;

    public function setUp()
    {
        $this->filter = new \MarcusJaschen\Collmex\Filter\Windows1252ToUtf8();
    }

    public function tearDown()
    {
        unset($this->filter);
    }

    public function testEncodeString()
    {
        $input    = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '_fixtures' . DIRECTORY_SEPARATOR . 'cp1252.txt');
        $expected = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '_fixtures' . DIRECTORY_SEPARATOR . 'utf-8.txt');

        $this->assertEquals($expected, $this->filter->filter($input));
    }

    public function testEncodeArray()
    {
        $source = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '_fixtures' . DIRECTORY_SEPARATOR . 'cp1252.txt');
        $target = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '_fixtures' . DIRECTORY_SEPARATOR . 'utf-8.txt');

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
        $source = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '_fixtures' . DIRECTORY_SEPARATOR . 'cp1252.txt');
        $target = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '_fixtures' . DIRECTORY_SEPARATOR . 'utf-8.txt');

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
