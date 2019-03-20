<?php

namespace MarcusJaschen\Collmex\Tests\Unit;

use MarcusJaschen\Collmex\Exception\InvalidTypeIdentifierException;
use MarcusJaschen\Collmex\Type\Customer;
use MarcusJaschen\Collmex\Type\Revenue;
use MarcusJaschen\Collmex\Type\Subscription;
use MarcusJaschen\Collmex\TypeFactory;
use PHPUnit\Framework\TestCase;

class TypeFactoryTest extends TestCase
{
    /**
     * @var \MarcusJaschen\Collmex\TypeFactory
     */
    protected $typeFactory;

    protected function setUp(): void
    {
        $this->typeFactory = new TypeFactory();
    }

    public function testCreateCustomerTypeSuccessful(): void
    {
        $data = [
            'CMXKND',
            '12345',
            '1',
            'Herr',
            'Marcus',
            'Jaschen',
        ];

        $type = $this->typeFactory->getType($data);

        $this->assertInstanceOf(Customer::class, $type);
    }

    public function testCreateSubscriptionTypeSuccessful(): void
    {
        $data = [
            'CMXABO',
            '12345',
            '1',
            '20131001',
            '20141031',
            'PRODUCT_1',
            'Product Description',
            null,
            7,
            '20131101',
        ];

        $type = $this->typeFactory->getType($data);

        $this->assertInstanceOf(Subscription::class, $type);
    }

    public function testCreateRevenueTypeWorksAsExpected(): void
    {
        $data = [
            'CMXUMS',
            10001,
            1,
            '20110101',
            4712,
            100,
            19,
            10,
            '0,7',
            null,
            null,
            null,
            null,
            null,
            'EUR',
        ];

        $type = $this->typeFactory->getType($data);

        $this->assertInstanceOf(Revenue::class, $type);
    }

    public function testInvalidType(): void
    {
        $this->expectException(InvalidTypeIdentifierException::class);

        $data = [
            'INVALID_TYPE',
            'data',
            'foo',
            'bar',
        ];

        $this->typeFactory->getType($data);
    }
}
