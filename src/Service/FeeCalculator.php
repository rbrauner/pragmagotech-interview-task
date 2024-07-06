<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Service;

use PragmaGoTech\Interview\Contract\FeeCalculatorInterface;
use PragmaGoTech\Interview\Contract\LoanProposalInterface;
use PragmaGoTech\Interview\Exception\AmountGreaterThanMaximumException;
use PragmaGoTech\Interview\Exception\AmountLessThanMinimumException;
use PragmaGoTech\Interview\Factory\FeeEdgesFactory;
use PragmaGoTech\Interview\Factory\FeeStructureFactory;
use PragmaGoTech\Interview\Utils\Math;

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
        $amount = $application->getAmount();
        $term = $application->getTerm();
        $feeStructure = FeeStructureFactory::create($term);

        if ($feeStructure->getMinAmount() > $amount) {
            throw new AmountLessThanMinimumException();
        }

        if ($feeStructure->getMaxAmount() < $amount) {
            throw new AmountGreaterThanMaximumException();
        }

        // $feeEdges = FeeEdgesFactory::create($feeStructure, $amount);

        // $percentage = Math::calculatePercentageBetween(
        //     $amount,
        //     $feeEdges->getPrevAmount(),
        //     $feeEdges->getNextAmount()
        // );

        return 0.0;
    }
}
