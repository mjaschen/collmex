<?php

namespace MarcusJaschen\Collmex\Tests\Unit\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\AccountBalance;
use MarcusJaschen\Collmex\Type\TypeInterface;
use PHPUnit\Framework\TestCase;

class AccountBalanceTest extends TestCase
{
    /**
     * @test
     */
    public function isAbstractType()
    {
        $subject = new AccountBalance([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface()
    {
        $subject = new AccountBalance([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }
}
