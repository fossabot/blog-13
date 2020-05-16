<?php

namespace App\Libraries\Media\MediaCollections;

class File
{
    /**
     * @var string
     */
    public string $name;

    /**
     * @var int
     */
    public int $size;

    /**
     * @var string
     */
    public string $mimeType;

    /**
     * @param $media
     * @return static
     */
    public static function createFromMedia($media)
    {
        return new static($media->file_name, $media->size, $media->mime_type);
    }

    /**
     * File constructor.
     * @param string $name
     * @param int $size
     * @param string $mimeType
     */
    public function __construct(string $name, int $size, string $mimeType)
    {
        $this->name = $name;

        $this->size = $size;

        $this->mimeType = $mimeType;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "name: {$this->name}, size: {$this->size}, mime: {$this->mimeType}";
    }
}
