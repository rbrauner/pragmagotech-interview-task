<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Contract;

/**
 * Loan proposal interface. This interface is used to manage stored data in loan proposal.
 */
interface LoanProposalInterface
{
    public function getTerm(): int;

    public function getAmount(): float;
}
