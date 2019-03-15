<?php

namespace MarcusJaschen\Collmex\Tests\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\Invoice;
use MarcusJaschen\Collmex\Type\TypeInterface;
use PHPUnit\Framework\TestCase;

class InvoiceTest extends TestCase
{
    /**
     * @test
     */
    public function isAbstractType()
    {
        $subject = new Invoice([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface()
    {
        $subject = new Invoice([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }
}
