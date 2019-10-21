<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Tests\Unit\Type\Validator;

use MarcusJaschen\Collmex\Type\Subscription;
use MarcusJaschen\Collmex\Type\Validator\TimeInterval;
use PHPUnit\Framework\TestCase;

class TimeIntervalTest extends TestCase
{
    /**
     * @var TimeInterval
     */
    protected $validator;

    protected function setUp(): void
    {
        $this->validator = new TimeInterval();
    }

    /**
     * @test
     */
    public function validTimeInterval(): void
    {
        self::assertTrue($this->validator->validate(Subscription::INTERVAL_YEAR));
        self::assertTrue($this->validator->validate(Subscription::INTERVAL_HALF_YEAR));
        self::assertTrue($this->validator->validate(Subscription::INTERVAL_QUARTER));
        self::assertTrue($this->validator->validate(Subscription::INTERVAL_MONTH));
        self::assertTrue($this->validator->validate(Subscription::INTERVAL_YEAR_PREPAID));
        self::assertTrue($this->validator->validate(Subscription::INTERVAL_HALF_YEAR_PREPAID));
        self::assertTrue($this->validator->validate(Subscription::INTERVAL_QUARTER_PREPAID));
        self::assertTrue($this->validator->validate(Subscription::INTERVAL_MONTH_PREPAID));
    }

    /**
     * @test
     */
    public function invalidTimeInterval(): void
    {
        self::assertFalse($this->validator->validate(-1));
        self::assertFalse($this->validator->validate(8));
        self::assertFalse($this->validator->validate('Foo'));
        self::assertFalse($this->validator->validate(false));
        self::assertFalse($this->validator->validate(null));
    }
}
