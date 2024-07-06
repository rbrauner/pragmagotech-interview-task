<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Exception;

use Exception;

/**
 * Exception thrown when value is less than low.
 */
final class ValueLessThanLowException extends Exception
{
    public function __construct(
        string $message = "Value is less than low",
        int $code = 0,
        \Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
