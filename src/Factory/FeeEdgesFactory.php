<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Factory;

use PragmaGoTech\Interview\Contract\FeeEdgesInterface;
use PragmaGoTech\Interview\Contract\FeeStructureInterface;
use PragmaGoTech\Interview\Exception\FeeEdgesNotFoundException;
use PragmaGoTech\Interview\Model\FeeEdges;

/**
 * Fee edges factory. This factory is used to create fee edges for provided fee structure and amount.
 */
final class FeeEdgesFactory
{
    public static function create(FeeStructureInterface $feeStructure, float $amount): FeeEdgesInterface
    {
        $feeEdges = null;

        $data = $feeStructure->getData();
        $keys = array_keys($data);
        foreach (array_keys($data) as $key) {
            $prevValue = $key;
            $nextValue = $keys[array_search($key, $keys, true) + 1];

            if ($amount >= $prevValue && $amount <= $nextValue) {
                $feeEdges = new FeeEdges();
                $feeEdges
                    ->setPrevAmount($prevValue)
                    ->setPrevFee($data[$prevValue])
                    ->setNextAmount($nextValue)
                    ->setNextFee($data[$nextValue]);
                break;
            }
        }

        if (!$feeEdges instanceof FeeEdges) {
            throw new FeeEdgesNotFoundException();
        }

        return $feeEdges;
    }
}
