<?php

namespace MarcusJaschen\Collmex\Tests\Unit\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\PaymentConfirmation;
use MarcusJaschen\Collmex\Type\TypeInterface;
use PHPUnit\Framework\TestCase;

class PaymentConfirmationTest extends TestCase
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
