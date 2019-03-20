<?php
declare(strict_types=1);

namespace MarcusJaschen\Collmex\Tests\Unit\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\InvoiceOutputSet;
use MarcusJaschen\Collmex\Type\TypeInterface;
use PHPUnit\Framework\TestCase;

class InvoiceOutputSetTest extends TestCase
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
