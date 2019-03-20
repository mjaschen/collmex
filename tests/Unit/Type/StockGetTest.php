<?php

namespace MarcusJaschen\Collmex\Tests\Unit\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\StockGet;
use MarcusJaschen\Collmex\Type\TypeInterface;
use PHPUnit\Framework\TestCase;

class StockGetTest extends TestCase
{
    /**
     * @test
     */
    public function isAbstractType(): void
    {
        $subject = new StockGet([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface(): void
    {
        $subject = new StockGet([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }
}
