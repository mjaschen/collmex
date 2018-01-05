<?php

namespace MarcusJaschen\Collmex\Type;

class SubscriptionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Subscription
     */
    protected $type;

    public function setUp()
    {
        $this->type = new Subscription(
            array(
                'customer_id' => '12345',
                'client_id' => '1',
                'valid_from' => '20130901',
                'valid_to' => '20140831',
                'product_id' => '1',
                'product_description' => null,
                'price' => null,
                'interval' => Subscription::INTERVAL_MONTH,
                'next_invoice' => null,
            )
        );
    }

    public function tearDown()
    {
        unset($this->type);
    }

    public function testValidateSuccess()
    {
        $this->assertTrue($this->type->validate());
    }

    public function testValidateFailInvalidFromDate()
    {
        $this->type->valid_from = "21250101";

        $this->assertFalse($this->type->validate());
    }

    public function testValidateFailInvalidToDate()
    {
        $this->type->valid_to = "21250101";

        $this->assertFalse($this->type->validate());
    }

    public function testValidateFailInvalidInterval()
    {
        $this->type->interval = -1;

        $this->assertFalse($this->type->validate());
    }
}
