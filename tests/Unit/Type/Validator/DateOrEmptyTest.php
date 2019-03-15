<?php

namespace MarcusJaschen\Collmex\Tests\Unit\Type\Validator;

use PHPUnit\Framework\TestCase;

class DateOrEmptyTest extends TestCase
{
    /**
     * @var \MarcusJaschen\Collmex\Type\Validator\DateOrEmpty
     */
    protected $validator;

    protected function setUp()
    {
        $this->validator = new \MarcusJaschen\Collmex\Type\Validator\DateOrEmpty();
    }

    public function testValidDate()
    {
        $this->assertTrue($this->validator->validate('20130916'));
    }

    public function testEmptyValue()
    {
        $this->assertTrue($this->validator->validate(''));
    }

    public function testInvalidDateTooShort()
    {
        $this->assertFalse($this->validator->validate('2013'));
    }

    public function testInvalidDateTooLong()
    {
        $this->assertFalse($this->validator->validate('20130916100000'));
    }

    public function testInvalidYear()
    {
        $this->assertFalse($this->validator->validate('18230901'));
        $this->assertFalse($this->validator->validate('21250901'));
    }

    public function testInvalidMonth()
    {
        $this->assertFalse($this->validator->validate('20130001'));
        $this->assertFalse($this->validator->validate('20131301'));
    }

    public function testInvalidDay()
    {
        $this->assertFalse($this->validator->validate('20130900'));
        $this->assertFalse($this->validator->validate('20130932'));
    }
}
