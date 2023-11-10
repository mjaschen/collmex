<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Tests\Unit\CollmexField;

use MarcusJaschen\Collmex\CollmexField\Date;
use PHPUnit\Framework\TestCase;

class DateTest extends TestCase
{
    public function testConvertDateTimeToCollmexFormat(): void
    {
        $dateTime = new \DateTime('2022-09-21T00:00:00', new \DateTimeZone('Europe/Berlin'));

        $this->assertEquals('20220921', Date::fromDateTime($dateTime));
    }

    public function testConvertIsoFormatToDateTime(): void
    {
        $expected = new \DateTime('2022-09-21T00:00:00', new \DateTimeZone('Europe/Berlin'));

        $this->assertEquals($expected, Date::toDateTime('20220921'));
    }

    public function testConvertGermanFormatToDateTime(): void
    {
        $expected = new \DateTime('2022-09-21T00:00:00', new \DateTimeZone('Europe/Berlin'));

        $this->assertEquals($expected, Date::toDateTime('21.09.2022'));
    }

    public function testConvertIsoFormatToDateTimeWithTimezone(): void
    {
        $timezone = new \DateTimeZone('America/Chicago');
        $expected = new \DateTime('2022-09-21T00:00:00', $timezone);

        $this->assertEquals($expected, Date::toDateTime('20220921', $timezone));
    }

    public function testConvertGermanFormatToDateTimeWithTimezone(): void
    {
        $timezone = new \DateTimeZone('America/Chicago');
        $expected = new \DateTime('2022-09-21T00:00:00', $timezone);

        $this->assertEquals($expected, Date::toDateTime('21.09.2022', $timezone));
    }

    public function testConvertInvalidFormatToDateTime(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionCode(3_746_303_620);

        Date::toDateTime('09/21/2022');
    }
}
