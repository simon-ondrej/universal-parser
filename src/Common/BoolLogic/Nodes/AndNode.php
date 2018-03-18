<?php
declare(strict_types=1);

namespace SimonOndrej\Common\BoolLogic\Nodes;

use SimonOndrej\Common\BoolLogic\NodeInterface;

class AndNode implements NodeInterface
{
    /**
     * @var NodeInterface[]
     */
    private $filterNodes;

    /**
     * @param NodeInterface[] ...$filterNodes
     */
    public function __construct(NodeInterface ...$filterNodes)
    {
        $this->filterNodes = $filterNodes;
    }

    /**
     * {@inheritdoc}
     */
    public function matchesCondition(?string $forLine): bool
    {
        foreach ($this->filterNodes as $filterNode) {
            if (!$filterNode->matchesCondition($forLine)) {
                return false;
            }
        }

        return true;
    }
}
