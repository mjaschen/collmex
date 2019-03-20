<?php

namespace MarcusJaschen\Collmex\Tests\Unit\Type\Validator;

use PHPUnit\Framework\TestCase;

class DateOrEmptyTest extends TestCase
{
    /**
     * @var \MarcusJaschen\Collmex\Type\Validator\DateOrEmpty
     */
    protected $validator;

    protected function setUp(): void
    {
        $this->validator = new \MarcusJaschen\Collmex\Type\Validator\DateOrEmpty();
    }

    public function testValidDate(): void
    {
        $this->assertTrue($this->validator->validate('20130916'));
    }

    public function testEmptyValue(): void
    {
        $this->assertTrue($this->validator->validate(''));
    }

    public function testInvalidDateTooShort(): void
    {
        $this->assertFalse($this->validator->validate('2013'));
    }

    public function testInvalidDateTooLong(): void
    {
        $this->assertFalse($this->validator->validate('20130916100000'));
    }

    public function testInvalidYear(): void
    {
        $this->assertFalse($this->validator->validate('18230901'));
        $this->assertFalse($this->validator->validate('21250901'));
    }

    public function testInvalidMonth(): void
    {
        $this->assertFalse($this->validator->validate('20130001'));
        $this->assertFalse($this->validator->validate('20131301'));
    }

    public function testInvalidDay(): void
    {
        $this->assertFalse($this->validator->validate('20130900'));
        $this->assertFalse($this->validator->validate('20130932'));
    }
}
