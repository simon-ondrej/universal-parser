<?php
declare(strict_types=1);

namespace SimonOndrej\UniversalParser;

use SimonOndrej\Common\BoolLogic\NodeInterface;
use SimonOndrej\UniversalParser\ParsingProcessTrackers\VoidTracker;

class Config
{
    /**
     * @var LineFormatterInterface[]
     */
    private $beforeFilterFormatters = [];

    /**
     * @var NodeInterface
     */
    private $lineFilter;

    /**
     * @var LineFormatterInterface[]
     */
    private $afterFilterFormatters = [];

    /**
     * @var ParsingProcessTrackerInterface
     */
    private $processTracker;

    /**
     * @param array                               $beforeFilterFormatters
     * @param NodeInterface                       $lineFilter
     * @param array                               $afterFilterFormatters
     * @param null|ParsingProcessTrackerInterface $processTracker Defaults to a tracker which does nothing.
     */
    public function __construct(
        array $beforeFilterFormatters,
        NodeInterface $lineFilter,
        array $afterFilterFormatters,
        ?ParsingProcessTrackerInterface $processTracker = null
    )
    {
        $this->beforeFilterFormatters = $beforeFilterFormatters;
        $this->lineFilter             = $lineFilter;
        $this->afterFilterFormatters  = $afterFilterFormatters;
        $this->processTracker         = $processTracker ?? new VoidTracker();
    }

    /**
     * @return LineFormatterInterface[]
     */
    public function beforeFilterFormatters(): array
    {
        return $this->beforeFilterFormatters;
    }

    /**
     * @return NodeInterface
     */
    public function lineFilter(): NodeInterface
    {
        return $this->lineFilter;
    }

    /**
     * @return LineFormatterInterface[]
     */
    public function afterFilterFormatters(): array
    {
        return $this->afterFilterFormatters;
    }

    /**
     * @return ParsingProcessTrackerInterface
     */
    public function processTracker(): ParsingProcessTrackerInterface
    {
        return $this->processTracker;
    }
}
