<?php

namespace MarcusJaschen\Collmex\Tests\Unit\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\Delivery;
use MarcusJaschen\Collmex\Type\TypeInterface;
use PHPUnit\Framework\TestCase;

class DeliveryTest extends TestCase
{
    /**
     * @test
     */
    public function isAbstractType()
    {
        $subject = new Delivery([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface()
    {
        $subject = new Delivery([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }
}
