<?php
declare(strict_types=1);

namespace SimonOndrej\Common;

interface WriterInterface
{
    public function writeLine(string $str): void;

    public function write(string $str): void;
}
