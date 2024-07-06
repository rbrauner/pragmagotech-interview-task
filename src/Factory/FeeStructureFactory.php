<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Factory;

use PragmaGoTech\Interview\Contract\FeeStructureInterface;
use PragmaGoTech\Interview\Exception\FeeStructureNotFoundException;
use PragmaGoTech\Interview\Model\FeeStructureFor12Months;
use PragmaGoTech\Interview\Model\FeeStructureFor24Months;

/**
 * Fee structure factory. This factory is used to create fee structure for provided term.
 */
final class FeeStructureFactory
{
    public static function create(int $term): FeeStructureInterface
    {
        return match ($term) {
            12 => new FeeStructureFor12Months(),
            24 => new FeeStructureFor24Months(),
            default => throw new FeeStructureNotFoundException(),
        };
    }
}
