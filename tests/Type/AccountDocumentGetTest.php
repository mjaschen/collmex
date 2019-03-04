<?php

namespace MarcusJaschen\Collmex\Tests\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\AccountDocumentGet;
use MarcusJaschen\Collmex\Type\TypeInterface;

class AccountDocumentGetTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function isAbstractType()
    {
        $subject = new AccountDocumentGet([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface()
    {
        $subject = new AccountDocumentGet([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }
}
