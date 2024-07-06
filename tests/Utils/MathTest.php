<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Tests\Utils;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PragmaGoTech\Interview\Exception\LowGreaterThanHighException;
use PragmaGoTech\Interview\Exception\RangeEqualException;
use PragmaGoTech\Interview\Exception\ValueGreaterThanHighException;
use PragmaGoTech\Interview\Exception\ValueLessThanLowException;
use PragmaGoTech\Interview\Utils\Math;

/**
 * @internal
 */
#[CoversClass(Math::class)]
final class MathTest extends TestCase
{
    public function testCalculatePercentageBetweenPositive(): void
    {
        // Act
        $value = Math::calculatePercentageBetween(10, 0, 100);

        // Assert
        $this->assertEquals(10, $value);
    }

    public function testCalculatePercentageBetweenNegative(): void
    {
        // Act
        $value = Math::calculatePercentageBetween(-90, -100, 0);

        // Assert
        $this->assertEquals(10, $value);
    }

    public function testCalculatePercentageBetweenPositiveAndNegative(): void
    {
        // Act
        $value = Math::calculatePercentageBetween(-40, -50, 50);

        // Assert
        $this->assertEquals(10, $value);
    }

    public function testCalculatePercentageBetweenMin(): void
    {
        // Act
        $value = Math::calculatePercentageBetween(0, 0, 100);

        // Assert
        $this->assertEquals(0, $value);
    }

    public function testCalculatePercentageBetweenMax(): void
    {
        // Act
        $value = Math::calculatePercentageBetween(100, 0, 100);

        // Assert
        $this->assertEquals(100, $value);
    }

    public function testCalculatePercentageBetweenBelowRange(): void
    {
        // Assert
        $this->expectException(ValueLessThanLowException::class);

        // Act
        Math::calculatePercentageBetween(-1, 0, 100);
    }

    public function testCalculatePercentageBetweenAboveRange(): void
    {
        // Assert
        $this->expectException(ValueGreaterThanHighException::class);

        // Act
        Math::calculatePercentageBetween(101, 0, 100);
    }

    public function testCalculatePercentageBetweenSwapRange(): void
    {
        // Assert
        $this->expectException(LowGreaterThanHighException::class);

        // Act
        Math::calculatePercentageBetween(100, 100, 0);
    }

    public function testCalculatePercentageBetweenRangeEqual(): void
    {
        // Assert
        $this->expectException(RangeEqualException::class);

        // Act
        Math::calculatePercentageBetween(100, 100, 100);
    }
}
