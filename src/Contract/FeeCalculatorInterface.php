<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Contract;

/**
 * Fee calculator interface.
 */
interface FeeCalculatorInterface
{
    public function calculate(LoanProposalInterface $application): float;
}
