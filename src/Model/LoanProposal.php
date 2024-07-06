<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Model;

use PragmaGoTech\Interview\Contract\LoanProposalInterface;

/**
 * A cut down version of a loan application containing
 * only the required properties for this test.
 */
final readonly class LoanProposal implements LoanProposalInterface
{
    public function __construct(
        private int $term,
        private float $amount
    ) {
    }

    /**
     * Term (loan duration) for this loan application
     * in number of months.
     */
    #[\Override]
    public function getTerm(): int
    {
        return $this->term;
    }

    /**
     * Amount requested for this loan application.
     */
    #[\Override]
    public function getAmount(): float
    {
        return $this->amount;
    }
}
