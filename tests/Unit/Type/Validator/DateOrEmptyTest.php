<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Tests\Unit\Type\Validator;

use MarcusJaschen\Collmex\Type\Validator\DateOrEmpty as DateOrEmptyValidator;
use PHPUnit\Framework\TestCase;

class DateOrEmptyTest extends TestCase
{
    /**
     * @var DateOrEmptyValidator
     */
    protected $validator;

    protected function setUp(): void
    {
        $this->validator = new DateOrEmptyValidator();
    }

    /**
     * @test
     */
    public function validDate(): void
    {
        self::assertTrue($this->validator->validate('20130916'));
    }

    /**
     * @test
     */
    public function emptyValue(): void
    {
        self::assertTrue($this->validator->validate(''));
    }

    /**
     * @test
     */
    public function invalidDateTooShort(): void
    {
        self::assertFalse($this->validator->validate('2013'));
    }

    /**
     * @test
     */
    public function invalidDateTooLong(): void
    {
        self::assertFalse($this->validator->validate('20130916100000'));
    }

    /**
     * @test
     */
    public function invalidYear(): void
    {
        self::assertFalse($this->validator->validate('18230901'));
        self::assertFalse($this->validator->validate('21250901'));
    }

    /**
     * @test
     */
    public function invalidMonth(): void
    {
        self::assertFalse($this->validator->validate('20130001'));
        self::assertFalse($this->validator->validate('20131301'));
    }

    /**
     * @test
     */
    public function invalidDay(): void
    {
        self::assertFalse($this->validator->validate('20130900'));
        self::assertFalse($this->validator->validate('20130932'));
    }
}
