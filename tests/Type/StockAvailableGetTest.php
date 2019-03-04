<?php

namespace MarcusJaschen\Collmex\Tests\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\StockAvailableGet;
use MarcusJaschen\Collmex\Type\TypeInterface;

class StockAvailableGetTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function isAbstractType()
    {
        $subject = new StockAvailableGet([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface()
    {
        $subject = new StockAvailableGet([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }
}
