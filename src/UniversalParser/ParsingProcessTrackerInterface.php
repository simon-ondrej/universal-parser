<?php
declare(strict_types=1);

namespace SimonOndrej\UniversalParser;

interface ParsingProcessTrackerInterface
{
    public function parsingHasBegun(): void;

    public function nthLineHasBeenProcessed(int $countOfCurrentlyProcessedLines): void;

    public function parsingHasCompleted(): void;
}
