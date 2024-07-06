<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Exception;

use Exception;

/**
 * Exception thrown when range is equal.
 */
final class RangeEqualException extends Exception
{
    public function __construct(
        string $message = "Range cannot be equal",
        int $code = 0,
        \Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
