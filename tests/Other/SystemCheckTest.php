<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Tests\Other;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
#[CoversNothing]
final class SystemCheckTest extends TestCase
{
    public function testSystemIsWorking(): void
    {
        $this->assertTrue(true);
    }
}
