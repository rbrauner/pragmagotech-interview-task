<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Exception;

use Exception;

/**
 * Exception thrown when fee structure not found.
 */
final class FeeStructureNotFoundException extends Exception
{
    public function __construct(
        string $message = "Fee structure not found",
        int $code = 0,
        \Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
