<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Tests\Unit\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\CustomerAgreementGet;
use MarcusJaschen\Collmex\Type\TypeInterface;
use PHPUnit\Framework\TestCase;

class CustomerAgreementGetTest extends TestCase
{
    /**
     * @test
     */
    public function isAbstractType(): void
    {
        $subject = new CustomerAgreementGet([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface(): void
    {
        $subject = new CustomerAgreementGet([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }

    /**
     * @test
     */
    public function generatesCsvWithFilters(): void
    {
        $subject = new CustomerAgreementGet([
            'client_id' => '1',
            'customer_id' => '12345',
            'changed_only' => '1',
            'system_name' => 'SentaNG',
        ]);

        $csv = $subject->getCsv();

        self::assertStringContainsString('CUSTOMER_AGREEMENT_GET', $csv);
        self::assertStringContainsString('12345', $csv);
        self::assertStringContainsString('SentaNG', $csv);
    }
}
