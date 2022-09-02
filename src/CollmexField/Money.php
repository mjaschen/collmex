<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\CollmexField;

class Money
{
    /**
     * Formats a money value given as float to Collmex format.
     *
     * Examples with default round mode:
     *
     * value given: 19.99
     * Collmex format: 19,99
     *
     * value given: .85
     * Collmex format: 0,85
     *
     *
     * value given: 0.305
     * Collmex format: 0,31
     */
    public static function fromFloat(float $amount, int $roundMode = PHP_ROUND_HALF_UP): string
    {
        return number_format(round($amount, 2, $roundMode), 2, ',', '');
    }

    /**
     * Formats a money value given as cents (integer type) to Collmex format.
     *
     * Examples with default round mode:
     *
     * value given: 1999
     * Collmex format: 19,99
     *
     * value given: 85
     * Collmex format: 0,85
     */
    public static function fromCents(int $cents): string
    {
        return number_format(round($cents / 100, 2), 2, ',', '');
    }

    /**
     * Formats a money value given as \Money\Money to Collmex format.
     *
     * Examples with default round mode:
     *
     * value given: new \Money\Money(1999, new \Money\Currency('EUR'))
     * Collmex format: 19,99
     *
     * value given: new \Money\Money(85, new \Money\Currency('EUR'))
     * Collmex format: 0,85
     *
     * @see https://www.moneyphp.org/en/stable/
     */
    public static function fromMoney(\Money\Money $money): string
    {
        return self::fromCents((int)$money->getAmount());
    }
}
