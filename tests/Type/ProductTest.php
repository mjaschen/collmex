<?php

namespace MarcusJaschen\Collmex\Tests\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\Product;
use MarcusJaschen\Collmex\Type\TypeInterface;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    /**
     * @test
     */
    public function isAbstractType()
    {
        $subject = new Product([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface()
    {
        $subject = new Product([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }
}
