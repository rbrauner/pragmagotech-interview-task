<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Contract;

/**
 * Fee edges interface. This interface is used to store the fee edges from fee structure for provided amount.
 */
interface FeeEdgesInterface
{
    public function getPrevAmount(): float;

    public function setPrevAmount(float $value): self;

    public function getPrevFee(): float;

    public function setPrevFee(float $value): self;

    public function getNextAmount(): float;

    public function setNextAmount(float $value): self;

    public function getNextFee(): float;

    public function setNextFee(float $value): self;
}
