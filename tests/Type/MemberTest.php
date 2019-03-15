<?php

namespace MarcusJaschen\Collmex\Tests\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\Member;
use MarcusJaschen\Collmex\Type\TypeInterface;
use PHPUnit\Framework\TestCase;

class MemberTest extends TestCase
{
    /**
     * @test
     */
    public function isAbstractType()
    {
        $subject = new Member([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface()
    {
        $subject = new Member([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }
}
