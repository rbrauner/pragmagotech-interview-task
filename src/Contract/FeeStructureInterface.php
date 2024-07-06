<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Contract;

/**
 * Fee structure interface. This interface is used to manage stored data in fee structure.
 */
interface FeeStructureInterface
{
    /**
     * @return array<int, int>
     */
    public function getData(): array;

    public function getMinAmount(): int;

    public function getMaxAmount(): int;
}
