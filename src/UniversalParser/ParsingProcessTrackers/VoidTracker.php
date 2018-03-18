<?php
declare(strict_types=1);

namespace SimonOndrej\UniversalParser\ParsingProcessTrackers;

use SimonOndrej\UniversalParser\ParsingProcessTrackerInterface;

/**
 * Fallback process tracker which does nothing.
 */
class VoidTracker implements ParsingProcessTrackerInterface
{
    /**
     * {@inheritdoc}
     */
    public function parsingHasBegun(): void
    {
    }

    /**
     * {@inheritdoc}
     */
    public function nthLineHasBeenProcessed(int $countOfCurrentlyProcessedLines): void
    {
    }

    /**
     * {@inheritdoc}
     */
    public function parsingHasCompleted(): void
    {
    }
}
