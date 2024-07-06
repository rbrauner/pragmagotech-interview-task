<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Exception;

use Exception;

/**
 * Exception thrown when percentage is greater than 100.
 */
final class PercentageGreaterThan100Exception extends Exception
{
    public function __construct(
        string $message = "Percentage cannot be greater than 100",
        int $code = 0,
        \Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
