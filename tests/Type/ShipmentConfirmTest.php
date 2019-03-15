<?php

namespace MarcusJaschen\Collmex\Tests\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\ShipmentConfirm;
use MarcusJaschen\Collmex\Type\TypeInterface;
use PHPUnit\Framework\TestCase;

class ShipmentConfirmTest extends TestCase
{
    /**
     * @test
     */
    public function isAbstractType()
    {
        $subject = new ShipmentConfirm([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface()
    {
        $subject = new ShipmentConfirm([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }
}
