<?php

namespace MarcusJaschen\Collmex\Tests\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\NewObject;
use MarcusJaschen\Collmex\Type\TypeInterface;
use PHPUnit\Framework\TestCase;

class NewObjectTest extends TestCase
{
    /**
     * @test
     */
    public function isAbstractType()
    {
        $subject = new NewObject([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface()
    {
        $subject = new NewObject([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }
}
