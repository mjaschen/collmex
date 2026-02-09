<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Tests\Unit\Type;

use MarcusJaschen\Collmex\Type\CustomerOrder;
use PHPUnit\Framework\TestCase;

class AbstractTypeWithTest extends TestCase
{
    /**
     * @test
     */
    public function withReturnsNewInstanceWithMergedData(): void
    {
        $baseOrder = new CustomerOrder([
            'client_id' => '1',
            'customer_firstname' => 'Charly',
            'customer_lastname' => 'Cash',
        ]);

        $lineItem = $baseOrder->with([
            'product_description' => 'erster Artikel',
            'quantity' => '1',
        ]);

        self::assertInstanceOf(CustomerOrder::class, $lineItem);
        self::assertNotSame($baseOrder, $lineItem);

        $data = $lineItem->getData();

        self::assertSame('1', $data['client_id']);
        self::assertSame('Charly', $data['customer_firstname']);
        self::assertSame('Cash', $data['customer_lastname']);
        self::assertSame('erster Artikel', $data['product_description']);
        self::assertSame('1', $data['quantity']);
    }

    /**
     * @test
     */
    public function withReturnsNewInstanceWithMergedDataAndOverwrittenFieldValue(): void
    {
        $baseOrder = new CustomerOrder([
            'client_id' => '1',
            'customer_firstname' => 'Charly',
            'customer_lastname' => 'Cash',
        ]);

        $lineItem = $baseOrder->with([
            'customer_firstname' => 'Charles',
            'product_description' => 'erster Artikel',
            'quantity' => '1',
        ]);

        self::assertInstanceOf(CustomerOrder::class, $lineItem);
        self::assertNotSame($baseOrder, $lineItem);

        $data = $lineItem->getData();

        self::assertSame('1', $data['client_id']);
        self::assertSame('Charles', $data['customer_firstname']);
        self::assertSame('Cash', $data['customer_lastname']);
        self::assertSame('erster Artikel', $data['product_description']);
        self::assertSame('1', $data['quantity']);
    }
}
