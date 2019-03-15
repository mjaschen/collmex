<?php

namespace MarcusJaschen\Collmex\Tests\Unit\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\PriceGroup;
use MarcusJaschen\Collmex\Type\TypeInterface;
use PHPUnit\Framework\TestCase;

class PriceGroupTest extends TestCase
{
    /**
     * @test
     */
    public function isAbstractType()
    {
        $subject = new PriceGroup([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface()
    {
        $subject = new PriceGroup([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }
}
