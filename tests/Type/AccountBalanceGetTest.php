<?php

namespace MarcusJaschen\Collmex\Tests\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\AccountBalanceGet;
use MarcusJaschen\Collmex\Type\TypeInterface;

class AccountBalanceGetTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function isAbstractType()
    {
        $subject = new AccountBalanceGet([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface()
    {
        $subject = new AccountBalanceGet([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }
}
