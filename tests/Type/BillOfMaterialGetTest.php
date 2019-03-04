<?php

namespace MarcusJaschen\Collmex\Tests\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\BillOfMaterialGet;
use MarcusJaschen\Collmex\Type\TypeInterface;

class BillOfMaterialGetTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function isAbstractType()
    {
        $subject = new BillOfMaterialGet([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface()
    {
        $subject = new BillOfMaterialGet([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }
}
