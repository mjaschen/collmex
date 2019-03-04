<?php

namespace MarcusJaschen\Collmex\Tests\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\DifferentShippingAddress;
use MarcusJaschen\Collmex\Type\TypeInterface;

class DifferentShippingAddressTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function isAbstractType()
    {
        $subject = new DifferentShippingAddress([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface()
    {
        $subject = new DifferentShippingAddress([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }
}
