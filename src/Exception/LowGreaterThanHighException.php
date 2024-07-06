<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Exception;

use Exception;

/**
 * Exception thrown when low is greater than high.
 */
final class LowGreaterThanHighException extends Exception
{
    public function __construct(
        string $message = "Low is greater than high",
        int $code = 0,
        \Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
