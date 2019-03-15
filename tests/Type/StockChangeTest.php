<?php

namespace MarcusJaschen\Collmex\Tests\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\StockChange;
use MarcusJaschen\Collmex\Type\TypeInterface;
use PHPUnit\Framework\TestCase;

class StockChangeTest extends TestCase
{
    /**
     * @test
     */
    public function isAbstractType()
    {
        $subject = new StockChange([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface()
    {
        $subject = new StockChange([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }
}
