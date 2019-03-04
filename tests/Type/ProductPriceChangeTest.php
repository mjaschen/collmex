<?php

namespace MarcusJaschen\Collmex\Tests\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\ProductPriceChange;
use MarcusJaschen\Collmex\Type\TypeInterface;

class ProductPriceChangeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function isAbstractType()
    {
        $subject = new ProductPriceChange([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface()
    {
        $subject = new ProductPriceChange([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }
}
