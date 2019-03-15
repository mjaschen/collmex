<?php

namespace MarcusJaschen\Collmex\Tests\Unit\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\StockAvailable;
use MarcusJaschen\Collmex\Type\TypeInterface;
use PHPUnit\Framework\TestCase;

class StockAvailableTest extends TestCase
{
    /**
     * @test
     */
    public function isAbstractType()
    {
        $subject = new StockAvailable([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface()
    {
        $subject = new StockAvailable([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }
}
