<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Model;

use PragmaGoTech\Interview\Contract\FeeStructureInterface;

/**
 * Abstract class for fee structure. This class contains common methods for fee structure.
 */
abstract class AbstractFeeStructure implements FeeStructureInterface
{
    /**
     * @var array<int, int>
     */
    protected array $data = [
    ];

    /**
     * @return array<int, int>
     */
    #[\Override]
    public function getData(): array
    {
        return $this->data;
    }

    #[\Override]
    public function getMinAmount(): int
    {
        return (int) array_key_first($this->data);
    }

    #[\Override]
    public function getMaxAmount(): int
    {
        return (int) array_key_last($this->data);
    }
}
