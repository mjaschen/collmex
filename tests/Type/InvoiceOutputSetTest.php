<?php

namespace MarcusJaschen\Collmex\Tests\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\InvoiceOutputSet;
use MarcusJaschen\Collmex\Type\TypeInterface;

class InvoiceOutputSetTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function isAbstractType()
    {
        $subject = new InvoiceOutputSet([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface()
    {
        $subject = new InvoiceOutputSet([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }
}
