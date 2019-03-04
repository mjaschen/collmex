<?php

namespace MarcusJaschen\Collmex\Tests\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\PriceGroupsGet;
use MarcusJaschen\Collmex\Type\TypeInterface;

class PriceGroupsGetTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function isAbstractType()
    {
        $subject = new PriceGroupsGet([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface()
    {
        $subject = new PriceGroupsGet([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }
}
