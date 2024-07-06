<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Utils;

use PragmaGoTech\Interview\Exception\LowGreaterThanHighException;
use PragmaGoTech\Interview\Exception\PercentageGreaterThan100Exception;
use PragmaGoTech\Interview\Exception\PercentageLessThanZeroException;
use PragmaGoTech\Interview\Exception\RangeEqualException;
use PragmaGoTech\Interview\Exception\ValueGreaterThanHighException;
use PragmaGoTech\Interview\Exception\ValueLessThanLowException;

/**
 * Math utility class. Contains methods for mathematical calculations.
 */
final class Math
{
    /**
     * Calculate the percentage between two numbers.
     * E.g. for value 5 between 0 and 10, the result is 50.
     */
    public static function calculatePercentageBetween(float $value, float $low, float $high): float
    {
        if ($low > $high) {
            throw new LowGreaterThanHighException();
        }

        if ($low === $high) {
            throw new RangeEqualException();
        }

        if ($low > $value) {
            throw new ValueLessThanLowException();
        }

        if ($high < $value) {
            throw new ValueGreaterThanHighException();
        }

        return (($value - $low) / ($high - $low)) * 100;
    }

    /**
     * Calculate the value between two numbers with a given percentage.
     * E.g. for percentage 50 between 0 and 10, the result is 5.
     */
    public static function calculateValueBetweenWithPercentage(float $percentage, float $low, float $high): float
    {
        if ($low > $high) {
            throw new LowGreaterThanHighException();
        }

        if ($low === $high) {
            throw new RangeEqualException();
        }

        if ($percentage < 0) {
            throw new PercentageLessThanZeroException();
        }

        if ($percentage > 100) {
            throw new PercentageGreaterThan100Exception();
        }

        $value = $low;

        return $value + ($percentage / 100) * ($high - $low);
    }

    /**
     * Round up a number to the nearest multiple of another number.
     * E.g. for number 13 and multiple 5, the result is 15.
     */
    public static function roundUpToAny(float $n, int $x = 5): float
    {
        return (ceil($n) % $x === 0) ? ceil($n) : round(($n + $x / 2) / $x) * $x;
    }
}
