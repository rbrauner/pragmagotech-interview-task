<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Exception;

use Exception;

/**
 * Exception thrown when percentage is less than zero.
 */
final class PercentageLessThanZeroException extends Exception
{
    public function __construct(
        string $message = "Percentage cannot be less than zero",
        int $code = 0,
        \Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
