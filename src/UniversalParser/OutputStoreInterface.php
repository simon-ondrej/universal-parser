<?php
declare(strict_types=1);

namespace SimonOndrej\UniversalParser;

interface OutputStoreInterface extends \IteratorAggregate
{
    /**
     * The implementation MUST lookup if record is already present in the output store, if not it MUST add the record
     * with an occurrence count of 1, otherwise increase the current occurrence count by one.
     *
     * @param string $record
     */
    public function addRecordOrIncreaseOccurrenceCount(?string $record): void;

    /**
     * Must return a \Traversable object with key being the record and value the occurrence count.
     *
     * @return \Traversable
     */
    public function getIterator(): \Traversable;
}
