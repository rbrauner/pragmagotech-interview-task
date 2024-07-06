<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Exception;

use Exception;

/**
 * Exception thrown when fee edges not found.
 */
final class FeeEdgesNotFoundException extends Exception
{
    public function __construct(
        string $message = "Fee edges not found",
        int $code = 0,
        \Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
