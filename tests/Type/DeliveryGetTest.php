<?php

namespace MarcusJaschen\Collmex\Tests\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\DeliveryGet;
use MarcusJaschen\Collmex\Type\TypeInterface;

class DeliveryGetTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function isAbstractType()
    {
        $subject = new DeliveryGet([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface()
    {
        $subject = new DeliveryGet([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }
}
