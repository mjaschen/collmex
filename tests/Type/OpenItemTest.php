<?php

namespace MarcusJaschen\Collmex\Tests\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\OpenItem;
use MarcusJaschen\Collmex\Type\TypeInterface;
use PHPUnit\Framework\TestCase;

class OpenItemTest extends TestCase
{
    /**
     * @test
     */
    public function isAbstractType()
    {
        $subject = new OpenItem([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface()
    {
        $subject = new OpenItem([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }
}
