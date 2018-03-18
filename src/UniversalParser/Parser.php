<?php
declare(strict_types=1);

namespace SimonOndrej\UniversalParser;

class Parser
{
    /**
     * @var OutputStoreInterface
     */
    private $outputStore;

    /**
     * @var Config
     */
    private $config;

    /**
     * @param OutputStoreInterface $outputStore
     * @param Config               $config
     */
    public function __construct(OutputStoreInterface $outputStore, Config $config)
    {
        $this->config      = $config;
        $this->outputStore = $outputStore;
    }

    /**
     * @param StreamReaderInterface $streamReader
     *
     * @return OutputStoreInterface
     */
    public function processStream(StreamReaderInterface $streamReader): OutputStoreInterface
    {
        $processTracker = $this->config->processTracker();
        $processedLines = 0;

        $processTracker->parsingHasBegun();
        while ($streamReader->hasNextLine()) {
            $line = $this->formatLine($streamReader->nextLine(), ...$this->config->beforeFilterFormatters());
            if ($this->config->lineFilter()->matchesCondition($line)) {
                $this->outputStore->addRecordOrIncreaseOccurrenceCount(
                    $this->formatLine($line, ...$this->config->afterFilterFormatters())
                );
            }

            $processTracker->nthLineHasBeenProcessed(++$processedLines);
        }

        $processTracker->parsingHasCompleted();

        return $this->outputStore;
    }

    /**
     * @param null|string              $line
     * @param LineFormatterInterface[] ...$formatters
     *
     * @return null|string
     */
    private function formatLine(?string $line, LineFormatterInterface ...$formatters): ?string
    {
        $carry = $line;
        foreach ($formatters as $formatter) {
            $carry = $formatter->format($carry);
        }

        return $carry;
    }
}
