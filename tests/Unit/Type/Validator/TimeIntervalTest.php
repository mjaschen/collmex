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

    protected function setUp()
    {
        $this->validator = new TimeInterval();
    }

    public function testValidTimeInterval()
    {
        $this->assertTrue($this->validator->validate(Subscription::INTERVAL_YEAR));
        $this->assertTrue($this->validator->validate(Subscription::INTERVAL_HALF_YEAR));
        $this->assertTrue($this->validator->validate(Subscription::INTERVAL_QUARTER));
        $this->assertTrue($this->validator->validate(Subscription::INTERVAL_MONTH));
        $this->assertTrue($this->validator->validate(Subscription::INTERVAL_YEAR_PREPAID));
        $this->assertTrue($this->validator->validate(Subscription::INTERVAL_HALF_YEAR_PREPAID));
        $this->assertTrue($this->validator->validate(Subscription::INTERVAL_QUARTER_PREPAID));
        $this->assertTrue($this->validator->validate(Subscription::INTERVAL_MONTH_PREPAID));
    }

    public function testInvalidTimeInterval()
    {
        $this->assertFalse($this->validator->validate(-1));
        $this->assertFalse($this->validator->validate(8));
        $this->assertFalse($this->validator->validate('Foo'));
        $this->assertFalse($this->validator->validate(false));
        $this->assertFalse($this->validator->validate(null));
    }
}
