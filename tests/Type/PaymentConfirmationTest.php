<?php

namespace MarcusJaschen\Collmex\Tests\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\PaymentConfirmation;
use MarcusJaschen\Collmex\Type\TypeInterface;

class PaymentConfirmationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function isAbstractType()
    {
        $subject = new PaymentConfirmation([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface()
    {
        $subject = new PaymentConfirmation([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }
}
