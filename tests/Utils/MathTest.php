<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Tests\Utils;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PragmaGoTech\Interview\Exception\LowGreaterThanHighException;
use PragmaGoTech\Interview\Exception\PercentageGreaterThan100Exception;
use PragmaGoTech\Interview\Exception\PercentageLessThanZeroException;
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
    // calculatePercentageBetween

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

    // calculateValueBetweenWithPercentage

    public function testCalculateValueBetweenWithPercentagePositive(): void
    {
        // Act
        $value = Math::calculateValueBetweenWithPercentage(10, 100, 200);

        // Assert
        $this->assertEquals(110, $value);
    }

    public function testCalculateValueBetweenWithPercentageNegative(): void
    {
        // Act
        $value = Math::calculateValueBetweenWithPercentage(10, -200, -100);

        // Assert
        $this->assertEquals(-190, $value);
    }

    public function testCalculateValueBetweenWithPercentagePositiveAndNegative(): void
    {
        // Act
        $value = Math::calculateValueBetweenWithPercentage(10, -50, 50);

        // Assert
        $this->assertEquals(-40, $value);
    }

    public function testCalculateValueBetweenWithPercentageMin(): void
    {
        // Act
        $value = Math::calculateValueBetweenWithPercentage(0, 100, 200);

        // Assert
        $this->assertEquals(100, $value);
    }

    public function testCalculateValueBetweenWithPercentageMax(): void
    {
        // Act
        $value = Math::calculateValueBetweenWithPercentage(100, 100, 200);

        // Assert
        $this->assertEquals(200, $value);
    }

    public function testCalculateValueBetweenWithPercentageBelowZero(): void
    {
        // Assert
        $this->expectException(PercentageLessThanZeroException::class);

        // Act
        Math::calculateValueBetweenWithPercentage(-1, 100, 200);
    }

    public function testCalculateValueBetweenWithPercentageAbove100(): void
    {
        // Assert
        $this->expectException(PercentageGreaterThan100Exception::class);

        // Act
        Math::calculateValueBetweenWithPercentage(101, 100, 200);
    }

    public function testCalculateValueBetweenWithPercentageSwapRange(): void
    {
        // Assert
        $this->expectException(LowGreaterThanHighException::class);

        // Act
        Math::calculateValueBetweenWithPercentage(10, 200, 100);
    }

    public function testCalculateValueBetweenWithPercentageRangeEqual(): void
    {
        // Assert
        $this->expectException(RangeEqualException::class);

        // Act
        Math::calculateValueBetweenWithPercentage(10, 100, 100);
    }

    // roundUpToAny

    public function testRoundUpToAnyFor0(): void
    {
        // Act
        $value = Math::roundUpToAny(0);

        // Assert
        $this->assertEquals(0, $value);
    }

    public function testRoundUpToAnyFor1(): void
    {
        // Act
        $value = Math::roundUpToAny(1);

        // Assert
        $this->assertEquals(5, $value);
    }

    public function testRoundUpToAnyFor5(): void
    {
        // Act
        $value = Math::roundUpToAny(5);

        // Assert
        $this->assertEquals(5, $value);
    }

    public function testRoundUpToAnyForNegative5(): void
    {
        // Act
        $value = Math::roundUpToAny(-5);

        // Assert
        $this->assertEquals(-5, $value);
    }

    public function testRoundUpToAnyForNegative4(): void
    {
        // Act
        $value = Math::roundUpToAny(-4);

        // Assert
        $this->assertEquals(0, $value);
    }

    public function testRoundUpToAnyFor1WithX2(): void
    {
        // Act
        $value = Math::roundUpToAny(1, 2);

        // Assert
        $this->assertEquals(2, $value);
    }

    public function testRoundUpToAnyFor2WithX2(): void
    {
        // Act
        $value = Math::roundUpToAny(2, 2);

        // Assert
        $this->assertEquals(2, $value);
    }
}
