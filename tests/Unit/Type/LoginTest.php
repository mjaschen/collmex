<?php

namespace MarcusJaschen\Collmex\Tests\Unit\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\Login;
use MarcusJaschen\Collmex\Type\TypeInterface;
use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{
    /**
     * @test
     */
    public function isAbstractType()
    {
        $subject = new Login([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface()
    {
        $subject = new Login([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }
}
