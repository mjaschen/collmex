<?php
declare(strict_types=1);

namespace MarcusJaschen\Collmex\Tests\Unit\Type\Validator;

use PHPUnit\Framework\TestCase;

class DateTest extends TestCase
{
    /**
     * @var \MarcusJaschen\Collmex\Type\Validator\Date
     */
    protected $validator;

    protected function setUp(): void
    {
        $this->validator = new \MarcusJaschen\Collmex\Type\Validator\Date();
    }

    public function testValidDate(): void
    {
        self::assertTrue($this->validator->validate('20130916'));
    }

    public function testInvalidDateTooShort(): void
    {
        self::assertFalse($this->validator->validate('2013'));
    }

    public function testInvalidDateTooLong(): void
    {
        self::assertFalse($this->validator->validate('20130916100000'));
    }

    public function testInvalidYear(): void
    {
        self::assertFalse($this->validator->validate('18230901'));
        self::assertFalse($this->validator->validate('21250901'));
    }

    public function testInvalidMonth(): void
    {
        self::assertFalse($this->validator->validate('20130001'));
        self::assertFalse($this->validator->validate('20131301'));
    }

    public function testInvalidDay(): void
    {
        self::assertFalse($this->validator->validate('20130900'));
        self::assertFalse($this->validator->validate('20130932'));
    }
}
