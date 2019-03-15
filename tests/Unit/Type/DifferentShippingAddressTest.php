<?php

namespace MarcusJaschen\Collmex\Tests\Unit\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\DifferentShippingAddress;
use MarcusJaschen\Collmex\Type\TypeInterface;
use PHPUnit\Framework\TestCase;

class DifferentShippingAddressTest extends TestCase
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
