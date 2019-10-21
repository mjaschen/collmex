<?php

declare(strict_types=1);

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

    protected function setUp(): void
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

    /**
     * @test
     */
    public function isAbstractType(): void
    {
        $subject = new Subscription([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface(): void
    {
        $subject = new Subscription([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }

    /**
     * @test
     */
    public function validateSuccess(): void
    {
        self::assertTrue($this->type->validate());
    }

    /**
     * @test
     */
    public function validateFailInvalidFromDate(): void
    {
        $this->type->valid_from = '21250101';

        self::assertFalse($this->type->validate());
    }

    /**
     * @test
     */
    public function validateFailInvalidToDate(): void
    {
        $this->type->valid_to = '21250101';

        self::assertFalse($this->type->validate());
    }

    /**
     * @test
     */
    public function validateFailInvalidInterval(): void
    {
        $this->type->interval = -1;

        self::assertFalse($this->type->validate());
    }
}
