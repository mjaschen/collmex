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
            'system_name' => 'AcmeFoo',
        ]);

        $csv = $subject->getCsv();
        $csvFields = str_getcsv($csv, ';', '"', '');

        self::assertCount(8, $csvFields);
        self::assertSame('CUSTOMER_AGREEMENT_GET', $csvFields[0]);
        self::assertSame('1', $csvFields[1]);
        self::assertSame('12345', $csvFields[2]);
        self::assertSame('', $csvFields[3]);
        self::assertSame('', $csvFields[4]);
        self::assertSame('', $csvFields[5]);
        self::assertSame('1', $csvFields[6]);
        self::assertSame('AcmeFoo', $csvFields[7]);
    }
}
