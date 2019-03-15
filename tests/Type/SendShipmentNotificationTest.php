<?php

namespace MarcusJaschen\Collmex\Tests\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\SendShipmentNotification;
use MarcusJaschen\Collmex\Type\TypeInterface;
use PHPUnit\Framework\TestCase;

class SendShipmentNotificationTest extends TestCase
{
    /**
     * @test
     */
    public function isAbstractType()
    {
        $subject = new SendShipmentNotification([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface()
    {
        $subject = new SendShipmentNotification([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }
}
