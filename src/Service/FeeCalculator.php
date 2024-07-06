<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Service;

use PragmaGoTech\Interview\Contract\FeeCalculatorInterface;
use PragmaGoTech\Interview\Contract\LoanProposalInterface;

/**
 * Fee calculator. Calculates the total fee for a loan proposal.
 */
final readonly class FeeCalculator implements FeeCalculatorInterface
{
    /**
     * @return float The calculated total fee.
     */
    #[\Override]
    public function calculate(LoanProposalInterface $application): float
    {
        return 0.0;
    }
}
