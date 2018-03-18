<?php
declare(strict_types=1);

namespace SimonOndrej\UniversalParser;

interface LineFilterInterface
{
    /**
     * @param string $line
     *
     * @return bool Should return true when line satisfies filter conditions.
     */
    public function isSatisfiedBy(string $line): bool;
}
