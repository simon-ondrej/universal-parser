<?php
declare(strict_types=1);

namespace SimonOndrej\UniversalParser\LineFilters;

use SimonOndrej\UniversalParser\LineFilterInterface;

/**
 * Allows lines which are not empty
 */
class IsNotEmpty implements LineFilterInterface
{
    /**
     * {@inheritdoc}
     */
    public function isSatisfiedBy(string $line): bool
    {
        return trim($line) !== '';
    }
}
