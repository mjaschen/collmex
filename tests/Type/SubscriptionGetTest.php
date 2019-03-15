<?php

namespace MarcusJaschen\Collmex\Tests\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\SubscriptionGet;
use MarcusJaschen\Collmex\Type\TypeInterface;
use PHPUnit\Framework\TestCase;

class SubscriptionGetTest extends TestCase
{
    /**
     * @test
     */
    public function isAbstractType()
    {
        $subject = new SubscriptionGet([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface()
    {
        $subject = new SubscriptionGet([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }
}
