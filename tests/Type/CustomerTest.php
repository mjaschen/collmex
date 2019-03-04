<?php

namespace MarcusJaschen\Collmex\Tests\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\Customer;
use MarcusJaschen\Collmex\Type\TypeInterface;

class CustomerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function isAbstractType()
    {
        $subject = new Customer([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface()
    {
        $subject = new Customer([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }
}
