<?php

namespace MarcusJaschen\Collmex\Tests\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\CustomerOrder;
use MarcusJaschen\Collmex\Type\TypeInterface;
use PHPUnit\Framework\TestCase;

class CustomerOrderTest extends TestCase
{
    /**
     * @test
     */
    public function isAbstractType()
    {
        $subject = new CustomerOrder([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface()
    {
        $subject = new CustomerOrder([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }
}
