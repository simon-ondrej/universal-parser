<?php
declare(strict_types=1);

namespace SimonOndrej\Common\Writers;

use SimonOndrej\Common\WriterInterface;

class EchoWriter implements WriterInterface
{
    public function writeLine(string $str): void
    {
        $this->write($str . PHP_EOL);
    }

    public function write(string $str): void
    {
        echo $str;
    }
}
