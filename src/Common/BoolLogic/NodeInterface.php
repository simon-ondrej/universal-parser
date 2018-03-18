<?php
declare(strict_types=1);

namespace SimonOndrej\Common\BoolLogic;

interface NodeInterface
{
    /**
     * @param string $forLine
     *
     * @return bool
     */
    public function matchesCondition(?string $forLine): bool;
}
