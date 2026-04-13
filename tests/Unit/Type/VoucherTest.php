<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Tests\Unit\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\TypeInterface;
use MarcusJaschen\Collmex\Type\Voucher;
use PHPUnit\Framework\TestCase;

class VoucherTest extends TestCase
{
    /**
     * @test
     */
    public function isAbstractType(): void
    {
        $subject = new Voucher([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface(): void
    {
        $subject = new Voucher([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }

    /**
     * @test
     */
    public function populatesRedemptionCountFromCsvData(): void
    {
        $data = [
            'VOUCHER',
            '123-456',
            '1',
            '0',
            '20250101',
            '20261231',
            '0',
            '50,00',
            'Test',
            '',
            '',
            'EUR',
            '3',
        ];

        $subject = new Voucher($data);

        self::assertSame('3', $subject->redemption_count);
    }
}
