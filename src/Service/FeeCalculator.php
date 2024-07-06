<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Service;

use PragmaGoTech\Interview\Contract\FeeCalculatorInterface;
use PragmaGoTech\Interview\Contract\LoanProposalInterface;
use PragmaGoTech\Interview\Factory\FeeStructureFactory;

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
        // $amount = $application->getAmount();
        // $term = $application->getTerm();
        // $feeStructure = FeeStructureFactory::create($term);

        return 0.0;
    }
}
