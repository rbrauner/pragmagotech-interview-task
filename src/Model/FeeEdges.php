<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Model;

use PragmaGoTech\Interview\Contract\FeeEdgesInterface;

/**
 * Fee edges model. This model is used to store the fee edges from fee structure for provided amount.
 *
 * E.g.
 * for amount 1500 and fee structure [1000 => 10, 2000 => 20, 3000 => 30]
 * the fee edges will be [1000 => 10, 2000 => 20],
 * so prevAmount = 1000, prevFee = 10, nextAmount = 2000, nextFee = 20.
 */
final class FeeEdges implements FeeEdgesInterface
{
    private float $prevAmount = 0;

    private float $prevFee = 0;

    private float $nextAmount = 0;

    private float $nextFee = 0;

    #[\Override]
    public function getPrevAmount(): float
    {
        return $this->prevAmount;
    }

    #[\Override]
    public function setPrevAmount(float $value): self
    {
        $this->prevAmount = $value;
        return $this;
    }

    #[\Override]
    public function getPrevFee(): float
    {
        return $this->prevFee;
    }

    #[\Override]
    public function setPrevFee(float $value): self
    {
        $this->prevFee = $value;
        return $this;
    }

    #[\Override]
    public function getNextAmount(): float
    {
        return $this->nextAmount;
    }

    #[\Override]
    public function setNextAmount(float $value): self
    {
        $this->nextAmount = $value;
        return $this;
    }

    #[\Override]
    public function getNextFee(): float
    {
        return $this->nextFee;
    }

    #[\Override]
    public function setNextFee(float $value): self
    {
        $this->nextFee = $value;
        return $this;
    }
}
