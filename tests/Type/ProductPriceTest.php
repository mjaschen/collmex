<?php

namespace MarcusJaschen\Collmex\Tests\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\ProductPrice;
use MarcusJaschen\Collmex\Type\TypeInterface;
use PHPUnit\Framework\TestCase;

class ProductPriceTest extends TestCase
{
    /**
     * @test
     */
    public function isAbstractType()
    {
        $subject = new ProductPrice([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface()
    {
        $subject = new ProductPrice([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }
}
