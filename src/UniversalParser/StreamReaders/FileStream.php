<?php
declare(strict_types=1);

namespace SimonOndrej\UniversalParser\StreamReaders;

use SimonOndrej\UniversalParser\StreamReaderInterface;

class FileStream implements StreamReaderInterface
{
    /**
     * @var string
     */
    private $fileName;

    /**
     * @var resource
     */
    private $handle;

    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * @return null|string Returns next line if present or null if next line does not exist.
     */
    public function nextLine(): ?string
    {
        if (!$this->hasNextLine()) {
            return null;
        }

        $nextLine = fgets($this->loadFileStream());

        return \is_bool($nextLine) ? '' : $nextLine;
    }

    /**
     * @return bool True when stream contains another line. Must not throw.
     */
    public function hasNextLine(): bool
    {
        return !feof($this->loadFileStream());
    }

    /**
     * @return bool|resource
     */
    private function loadFileStream()
    {
        if ($this->handle === null) {
            $this->handle = fopen($this->fileName, 'rb');
        }

        return $this->handle;
    }
}
