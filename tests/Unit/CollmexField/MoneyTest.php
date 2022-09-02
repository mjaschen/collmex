<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Tests\Unit\CollmexField;

use MarcusJaschen\Collmex\CollmexField\Money;
use Money\Currency;
use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase
{
    public function testConvertFromFloat(): void
    {
        $this->assertEquals('19,99', Money::fromFloat(19.99));
        $this->assertEquals('19,99', Money::fromFloat(19.990));
        $this->assertEquals('19,99', Money::fromFloat(19.994));
        $this->assertEquals('20,00', Money::fromFloat(19.995));
        $this->assertEquals('20,00', Money::fromFloat(20.00));
        $this->assertEquals('0,85', Money::fromFloat(0.85));
        $this->assertEquals('0,31', Money::fromFloat(0.31));
    }

    public function testConvertFromIntCents(): void
    {
        $this->assertEquals('19,99', Money::fromCents(1999));
        $this->assertEquals('20,00', Money::fromCents(2000));
        $this->assertEquals('0,85', Money::fromCents(85));
        $this->assertEquals('0,31', Money::fromCents(31));
    }

    public function testConvertFromMoney(): void
    {
        $this->assertEquals('19,99', Money::fromMoney(new \Money\Money(1999, new Currency('EUR'))));
        $this->assertEquals('20,00', Money::fromMoney(new \Money\Money(2000, new Currency('EUR'))));
        $this->assertEquals('0,85', Money::fromMoney(new \Money\Money(85, new Currency('EUR'))));
        $this->assertEquals('0,31', Money::fromMoney(new \Money\Money(31, new Currency('EUR'))));
        $this->assertEquals('19,99', Money::fromMoney(\Money\Money::EUR(1999)));
        $this->assertEquals('20,00', Money::fromMoney(\Money\Money::EUR(2000)));
        $this->assertEquals('0,85', Money::fromMoney(\Money\Money::EUR(85)));
        $this->assertEquals('0,31', Money::fromMoney(\Money\Money::EUR(31)));
    }
}
