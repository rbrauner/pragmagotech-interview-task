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
}
