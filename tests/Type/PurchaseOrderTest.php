<?php

namespace MarcusJaschen\Collmex\Tests\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\PurchaseOrder;
use MarcusJaschen\Collmex\Type\TypeInterface;
use PHPUnit\Framework\TestCase;

class PurchaseOrderTest extends TestCase
{
    /**
     * @test
     */
    public function isAbstractType()
    {
        $subject = new PurchaseOrder([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface()
    {
        $subject = new PurchaseOrder([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }
}
