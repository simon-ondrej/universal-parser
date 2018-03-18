<?php
declare(strict_types=1);

namespace SimonOndrej\UniversalParser;

use SimonOndrej\Common\BoolLogic\NodeInterface;

class FilterNode implements NodeInterface
{
    /**
     * @var LineFilterInterface
     */
    private $filter;

    /**
     * @param LineFilterInterface $filter
     */
    public function __construct(LineFilterInterface $filter)
    {
        $this->filter = $filter;
    }

    /**
     * {@inheritdoc}
     */
    public function matchesCondition(?string $forLine): bool
    {
        return $this->filter->isSatisfiedBy($forLine);
    }
}
