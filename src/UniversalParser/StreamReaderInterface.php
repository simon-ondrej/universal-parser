<?php
declare(strict_types=1);

namespace SimonOndrej\UniversalParser;

interface StreamReaderInterface
{
    /**
     * @return bool True when stream contains another line. Must not throw.
     */
    public function hasNextLine(): bool;

    /**
     * @return null|string Returns next line if present or null if next line does not exist.
     */
    public function nextLine(): ?string;
}
