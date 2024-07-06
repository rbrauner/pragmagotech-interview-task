<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Exception;

use Exception;

/**
 * Exception thrown when value is greater than high.
 */
final class ValueGreaterThanHighException extends Exception
{
    public function __construct(
        string $message = "Value is greater than high",
        int $code = 0,
        \Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
