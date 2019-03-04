<?php

namespace MarcusJaschen\Collmex\Tests\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\PurchaseOrderGet;
use MarcusJaschen\Collmex\Type\TypeInterface;

class PurchaseOrderGetTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function isAbstractType()
    {
        $subject = new PurchaseOrderGet([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface()
    {
        $subject = new PurchaseOrderGet([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }
}
