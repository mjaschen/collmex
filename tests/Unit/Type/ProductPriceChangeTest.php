<?php
declare(strict_types=1);

namespace MarcusJaschen\Collmex\Tests\Unit\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\ProductPriceChange;
use MarcusJaschen\Collmex\Type\TypeInterface;
use PHPUnit\Framework\TestCase;

class ProductPriceChangeTest extends TestCase
{
    /**
     * @test
     */
    public function isAbstractType()
    {
        $subject = new ProductPriceChange([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface()
    {
        $subject = new ProductPriceChange([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }
}
