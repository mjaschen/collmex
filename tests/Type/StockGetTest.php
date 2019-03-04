<?php

namespace MarcusJaschen\Collmex\Tests\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\StockGet;
use MarcusJaschen\Collmex\Type\TypeInterface;

class StockGetTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function isAbstractType()
    {
        $subject = new StockGet([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface()
    {
        $subject = new StockGet([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }
}
