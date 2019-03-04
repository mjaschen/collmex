<?php

namespace MarcusJaschen\Collmex\Tests\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\ShipmentConfirm;
use MarcusJaschen\Collmex\Type\TypeInterface;

class ShipmentConfirmTest extends \PHPUnit_Framework_TestCase
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
