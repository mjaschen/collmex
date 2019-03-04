<?php

namespace MarcusJaschen\Collmex\Tests\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\AccountDocument;
use MarcusJaschen\Collmex\Type\TypeInterface;

class AccountDocumentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function isAbstractType()
    {
        $subject = new AccountDocument([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface()
    {
        $subject = new AccountDocument([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }
}
