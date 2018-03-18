<?php
declare(strict_types=1);

namespace SimonOndrej\UniversalParser;

interface LineFormatterInterface
{
    /**
     * Formats line according to specific rule and returns it.
     *
     * @param null|string $line
     *
     * @return null|string
     */
    public function format(?string $line): ?string;
}
