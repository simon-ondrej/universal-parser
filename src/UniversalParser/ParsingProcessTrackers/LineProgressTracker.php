<?php
declare(strict_types=1);

namespace SimonOndrej\UniversalParser\ParsingProcessTrackers;

use SimonOndrej\Common\WriterInterface;
use SimonOndrej\UniversalParser\ParsingProcessTrackerInterface;

class LineProgressTracker implements ParsingProcessTrackerInterface
{
    /**
     * @var WriterInterface
     */
    private $writer;
    /**
     * @var int
     */
    private $trackEveryNthLine;

    /**
     * @param WriterInterface $writer
     * @param int             $trackEveryNthLine Specifies which line should be tracker as a progress.
     */
    public function __construct(WriterInterface $writer, $trackEveryNthLine = 10)
    {
        $this->writer            = $writer;
        $this->trackEveryNthLine = $trackEveryNthLine;
    }

    public function parsingHasBegun(): void
    {
        $this->writer->writeLine('Begun parsing stream.');
    }

    public function nthLineHasBeenProcessed(int $countOfCurrentlyProcessedLines): void
    {
        if ($this->isTracked($countOfCurrentlyProcessedLines)) {
            $this->writer->writeLine(sprintf(
                'Processed %dth line.',
                $countOfCurrentlyProcessedLines
            ));
        }
    }

    private function isTracked(int $countOfCurrentlyProcessedLines): bool
    {
        return $countOfCurrentlyProcessedLines % $this->trackEveryNthLine === 0;
    }

    public function parsingHasCompleted(): void
    {
        $this->writer->writeLine('Completed parsing stream.');
    }
}
