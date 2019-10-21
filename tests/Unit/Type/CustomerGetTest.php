<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Tests\Unit\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\CustomerGet;
use MarcusJaschen\Collmex\Type\Exception\InvalidFieldNameException;
use MarcusJaschen\Collmex\Type\TypeInterface;
use PHPUnit\Framework\TestCase;

class CustomerGetTest extends TestCase
{
    /**
     * @test
     */
    public function isAbstractType(): void
    {
        $subject = new CustomerGet([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface(): void
    {
        $subject = new CustomerGet([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }

    /**
     * @test
     *
     * @see https://github.com/mjaschen/collmex/issues/10
     */
    public function invalidFieldNamesThrowException(): void
    {
        $this->expectException(InvalidFieldNameException::class);

        new CustomerGet(
            [
                'customer_id' => '12345',
                'foo' => 'bar',
            ]
        );
    }
}
