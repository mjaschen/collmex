<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Tests\Unit\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\CustomerAgreement;
use MarcusJaschen\Collmex\Type\TypeInterface;
use PHPUnit\Framework\TestCase;

class CustomerAgreementTest extends TestCase
{
    /**
     * @test
     */
    public function isAbstractType(): void
    {
        $subject = new CustomerAgreement([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface(): void
    {
        $subject = new CustomerAgreement([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }

    /**
     * @test
     */
    public function populatesFieldsFromCsvData(): void
    {
        $data = [
            'CMXCAG',
            '1',
            '12345',
            'PAC01001',
            '1',
            '20250101',
            '99991231',
            '8,50',
            'EUR',
            '0',
        ];

        $subject = new CustomerAgreement($data);

        self::assertSame('12345', $subject->customer_id);
        self::assertSame('PAC01001', $subject->product_id);
        self::assertSame('8,50', $subject->price);
        self::assertSame('0', $subject->deleted);
    }

    /**
     * @test
     */
    public function generatesCsv(): void
    {
        $subject = new CustomerAgreement([
            'client_id' => '1',
            'customer_id' => '12345',
            'product_id' => 'PAC01001',
            'valid_from' => '20250101',
            'valid_to' => '99991231',
            'price' => '8,50',
            'currency' => 'EUR',
            'deleted' => '1',
        ]);

        $csv = $subject->getCsv();

        self::assertStringContainsString('CMXCAG', $csv);
        self::assertStringContainsString('12345', $csv);
        self::assertStringContainsString('PAC01001', $csv);
        self::assertStringContainsString('8,50', $csv);
    }
}
