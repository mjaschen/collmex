<?php
declare(strict_types=1);

namespace MarcusJaschen\Collmex\Tests\Unit\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\Stock;
use MarcusJaschen\Collmex\Type\TypeInterface;
use PHPUnit\Framework\TestCase;

class StockTest extends TestCase
{
    /**
     * @test
     */
    public function isAbstractType()
    {
        $subject = new Stock([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface()
    {
        $subject = new Stock([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }
}
