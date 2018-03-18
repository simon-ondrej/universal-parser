<?php
declare(strict_types=1);

namespace SimonOndrej\UniversalParser\OutputStores;

use SimonOndrej\UniversalParser\OutputStoreInterface;

class InMemoryStore implements OutputStoreInterface
{
    private $records = [];


    /**
     * {@inheritdoc}
     */
    public function addRecordOrIncreaseOccurrenceCount(?string $record): void
    {
        if (!array_key_exists($record, $this->records)) {
            $this->records[$record] = 0;
        }

        ++$this->records[$record];
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator(): \Traversable
    {
        foreach ($this->records as $record => $occurrenceCount) {
            yield $record => $occurrenceCount;
        }
    }
}
