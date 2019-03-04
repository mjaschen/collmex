<?php

namespace MarcusJaschen\Collmex\Tests\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\ShipmentOrdersGet;
use MarcusJaschen\Collmex\Type\TypeInterface;

class ShipmentOrdersGetTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function isAbstractType()
    {
        $subject = new ShipmentOrdersGet([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface()
    {
        $subject = new ShipmentOrdersGet([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }
}
