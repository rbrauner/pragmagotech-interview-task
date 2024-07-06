<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Exception;

use Exception;

/**
 * Exception thrown when amount is less than minimum amount.
 */
final class AmountLessThanMinimumException extends Exception
{
    public function __construct(
        string $message = "Amount is less than minimum amount",
        int $code = 0,
        \Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
