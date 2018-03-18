<?php
declare(strict_types=1);

namespace SimonOndrej\UniversalParser\LineFilters;

use SimonOndrej\UniversalParser\LineFilterInterface;

/**
 * Allows lines which contain only lowercase letters and nothing else.
 */
class ContainsOnlyLowercaseLetters implements LineFilterInterface
{
    /**
     * {@inheritdoc}
     */
    public function isSatisfiedBy(string $line): bool
    {
        return preg_match('/^[a-z]*$/', $line) === 1;
    }
}
