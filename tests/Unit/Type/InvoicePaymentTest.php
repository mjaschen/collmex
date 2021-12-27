<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Tests\Unit\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\InvoicePayment;
use MarcusJaschen\Collmex\Type\TypeInterface;
use PHPUnit\Framework\TestCase;

class InvoicePaymentTest extends TestCase
{
    /**
     * @test
     */
    public function isAbstractType(): void
    {
        $subject = new InvoicePayment([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface(): void
    {
        $subject = new InvoicePayment([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }
}
