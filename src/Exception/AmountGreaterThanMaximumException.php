<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Exception;

use Exception;

/**
 * Exception thrown when amount is greater than maximum amount.
 */
final class AmountGreaterThanMaximumException extends Exception
{
    public function __construct(
        string $message = "Amount is greater than maximum amount",
        int $code = 0,
        \Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
