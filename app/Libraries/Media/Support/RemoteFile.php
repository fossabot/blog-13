<?php

namespace App\Libraries\Media\Support;

/**
 * Class RemoteFile
 * @package App\Libraries\Media\Support
 */
class RemoteFile
{
    /**
     * @var string
     */
    protected string $key;

    /**
     * @var string
     */
    protected string $disk;

    /**
     * RemoteFile constructor.
     * @param string $key
     * @param string $disk
     */
    public function __construct(string $key, string $disk)
    {
        $this->key = $key;

        $this->disk = $disk;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @return string
     */
    public function getDisk(): string
    {
        return $this->disk;
    }

    /**
     * @return string
     */
    public function getFilename(): string
    {
        return basename($this->key);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return pathinfo($this->getFilename(), PATHINFO_FILENAME);
    }
}
