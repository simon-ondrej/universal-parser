<?php
declare(strict_types=1);

namespace SimonOndrej\UniversalParser\LineFormatters;

use SimonOndrej\UniversalParser\LineFormatterInterface;

class TrimFormatter implements LineFormatterInterface
{
    /**
     * {@inheritdoc}
     */
    public function format(?string $line): ?string
    {
        return $line === null ? null : trim($line);
    }
}
