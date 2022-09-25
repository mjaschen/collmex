<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Tests\Unit\Type\Validator;

use MarcusJaschen\Collmex\Type\Validator\Date as DateValidator;
use PHPUnit\Framework\TestCase;

class DateTest extends TestCase
{
    /**
     * @var DateValidator
     */
    protected $validator;

    protected function setUp(): void
    {
        $this->validator = new DateValidator();
    }

    /**
     * @test
     */
    public function validDate(): void
    {
        self::assertTrue($this->validator->validate('20130916'));
        self::assertTrue($this->validator->validate('16.09.2022'));
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
        self::assertFalse($this->validator->validate('16.09.2022 10:00:00'));
    }

    /**
     * @test
     */
    public function invalidYear(): void
    {
        self::assertFalse($this->validator->validate('18230901'));
        self::assertFalse($this->validator->validate('21250901'));
        self::assertFalse($this->validator->validate('01.09.1832'));
        self::assertFalse($this->validator->validate('01.09.2125'));
    }
}
