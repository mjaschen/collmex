<?php

namespace MarcusJaschen\Collmex\Tests\Unit\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\Subscription;
use MarcusJaschen\Collmex\Type\TypeInterface;
use PHPUnit\Framework\TestCase;

class SubscriptionTest extends TestCase
{
    /**
     * @var Subscription
     */
    protected $type;

    protected function setUp()
    {
        $this->type = new Subscription(
            [
                'customer_id' => '12345',
                'client_id' => '1',
                'valid_from' => '20130901',
                'valid_to' => '20140831',
                'product_id' => '1',
                'product_description' => null,
                'price' => null,
                'interval' => Subscription::INTERVAL_MONTH,
                'next_invoice' => null,
            ]
        );
    }

    public function tearDown()
    {
        unset($this->type);
    }

    /**
     * @test
     */
    public function isAbstractType()
    {
        $subject = new Subscription([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface()
    {
        $subject = new Subscription([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }

    public function testValidateSuccess()
    {
        $this->assertTrue($this->type->validate());
    }

    public function testValidateFailInvalidFromDate()
    {
        $this->type->valid_from = '21250101';

        $this->assertFalse($this->type->validate());
    }

    public function testValidateFailInvalidToDate()
    {
        $this->type->valid_to = '21250101';

        $this->assertFalse($this->type->validate());
    }

    public function testValidateFailInvalidInterval()
    {
        $this->type->interval = -1;

        $this->assertFalse($this->type->validate());
    }
}
