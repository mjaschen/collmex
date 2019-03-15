<?php

namespace MarcusJaschen\Collmex\Tests\Type;

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
    public function isAbstractType()
    {
        $subject = new CustomerGet([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface()
    {
        $subject = new CustomerGet([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }

    /**
     * @test
     *
     * @see https://github.com/mjaschen/collmex/issues/10
     */
    public function invalidFieldNamesThrowException()
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
