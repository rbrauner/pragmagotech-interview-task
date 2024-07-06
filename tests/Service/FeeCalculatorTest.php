<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Tests\Service;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PragmaGoTech\Interview\Contract\FeeCalculatorInterface;
use PragmaGoTech\Interview\Exception\AmountGreaterThanMaximumException;
use PragmaGoTech\Interview\Exception\AmountLessThanMinimumException;
use PragmaGoTech\Interview\Exception\FeeStructureNotFoundException;
use PragmaGoTech\Interview\Model\LoanProposal;
use PragmaGoTech\Interview\Service\FeeCalculator;

/**
 * @internal
 */
#[CoversClass(FeeCalculator::class)]
final class FeeCalculatorTest extends TestCase
{
    private FeeCalculatorInterface $calculator;

    #[\Override]
    protected function setUp(): void
    {
        $this->calculator = new FeeCalculator();
    }

    public function testTerm12CorrectScenario1(): void
    {
        // Arrange
        $application = new LoanProposal(12, 19250);

        // Act
        $fee = $this->calculator->calculate($application);

        // Assert
        $this->assertEquals(385, $fee);
    }

    public function testTerm12Min(): void
    {
        // Arrange
        $application = new LoanProposal(12, 1000);

        // Act
        $fee = $this->calculator->calculate($application);

        // Assert
        $this->assertEquals(50, $fee);
    }

    public function testTerm12Max(): void
    {
        // Arrange
        $application = new LoanProposal(12, 20000);

        // Act
        $fee = $this->calculator->calculate($application);

        // Assert
        $this->assertEquals(400, $fee);
    }

    public function testTerm12InRangeDividedBy5(): void
    {
        // Arrange
        $application = new LoanProposal(12, 5555);

        // Act
        $fee = $this->calculator->calculate($application);

        // Assert
        $this->assertEquals(115, $fee);
    }

    public function testTerm12InRangeNotDividedBy5(): void
    {
        // Arrange
        $application = new LoanProposal(12, 5554);

        // Act
        $fee = $this->calculator->calculate($application);

        // Assert
        $this->assertEquals(115, $fee);
    }

    public function testTerm12BelowRange(): void
    {
        // Assert
        $this->expectException(AmountLessThanMinimumException::class);

        // Arrange
        $application = new LoanProposal(12, 100);

        // Act
        $this->calculator->calculate($application);
    }

    public function testTerm12AboveRange(): void
    {
        // Assert
        $this->expectException(AmountGreaterThanMaximumException::class);

        // Arrange
        $application = new LoanProposal(12, 100000);

        // Act
        $this->calculator->calculate($application);
    }

    public function testTerm12OnZero(): void
    {
        // Assert
        $this->expectException(AmountLessThanMinimumException::class);

        // Arrange
        $application = new LoanProposal(12, 0);

        // Act
        $this->calculator->calculate($application);
    }

    public function testTerm12BelowZero(): void
    {
        // Assert
        $this->expectException(AmountLessThanMinimumException::class);

        // Arrange
        $application = new LoanProposal(12, -1);

        // Act
        $this->calculator->calculate($application);
    }

    public function testTerm24CorrectScenario1(): void
    {
        // Arrange
        $application = new LoanProposal(24, 2750);

        // Act
        $fee = $this->calculator->calculate($application);

        // Assert
        $this->assertEquals(115, $fee);
    }

    public function testTerm24CorrectScenario2(): void
    {
        // Arrange
        $application = new LoanProposal(24, 11500);

        // Act
        $fee = $this->calculator->calculate($application);

        // Assert
        $this->assertEquals(460, $fee);
    }

    public function testTerm24Min(): void
    {
        // Arrange
        $application = new LoanProposal(24, 1000);

        // Act
        $fee = $this->calculator->calculate($application);

        // Assert
        $this->assertEquals(70, $fee);
    }

    public function testTerm24Max(): void
    {
        // Arrange
        $application = new LoanProposal(24, 20000);

        // Act
        $fee = $this->calculator->calculate($application);

        // Assert
        $this->assertEquals(800, $fee);
    }

    public function testTerm24InRangeDividedBy5(): void
    {
        // Arrange
        $application = new LoanProposal(24, 5555);

        // Act
        $fee = $this->calculator->calculate($application);

        // Assert
        $this->assertEquals(225, $fee);
    }

    public function testTerm24InRangeNotDividedBy5(): void
    {
        // Arrange
        $application = new LoanProposal(24, 5554);

        // Act
        $fee = $this->calculator->calculate($application);

        // Assert
        $this->assertEquals(225, $fee);
    }

    public function testTerm24BelowRange(): void
    {
        // Assert
        $this->expectException(AmountLessThanMinimumException::class);

        // Arrange
        $application = new LoanProposal(24, 100);

        // Act
        $this->calculator->calculate($application);
    }

    public function testTerm24AboveRange(): void
    {
        // Assert
        $this->expectException(AmountGreaterThanMaximumException::class);

        // Arrange
        $application = new LoanProposal(24, 100000);

        // Act
        $this->calculator->calculate($application);
    }

    public function testTerm24OnZero(): void
    {
        // Assert
        $this->expectException(AmountLessThanMinimumException::class);

        // Arrange
        $application = new LoanProposal(24, 0);

        // Act
        $this->calculator->calculate($application);
    }

    public function testTerm24BelowZero(): void
    {
        // Assert
        $this->expectException(AmountLessThanMinimumException::class);

        // Arrange
        $application = new LoanProposal(24, -1);

        // Act
        $this->calculator->calculate($application);
    }

    public function testNotExistingTerm(): void
    {
        // Assert
        $this->expectException(FeeStructureNotFoundException::class);

        // Arrange
        $application = new LoanProposal(1, 5555);

        // Act
        $this->calculator->calculate($application);
    }
}
