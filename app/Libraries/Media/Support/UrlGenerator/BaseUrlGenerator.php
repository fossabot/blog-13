<?php

namespace App\Libraries\Media\Support\UrlGenerator;

use App\Libraries\Media\Conversions\Conversion;
use App\Libraries\Media\Support\PathGenerator\PathGenerator;
use App\Models\Media;
use Illuminate\Contracts\Config\Repository as Config;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;

/**
 * Class BaseUrlGenerator
 * @package App\Libraries\Media\Support\UrlGenerator
 */
abstract class BaseUrlGenerator implements UrlGenerator
{
    /**
     * @var null|Media
     */
    protected ?Media $media;

    /**
     * @var null|Conversion
     */
    protected ?Conversion $conversion = null;

    /**
     * @var null|PathGenerator
     */
    protected ?PathGenerator $pathGenerator;

    /**
     * @var Config
     */
    protected Config $config;

    /**
     * BaseUrlGenerator constructor.
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * @param Media $media
     * @return $this|UrlGenerator
     */
    public function setMedia(Media $media): UrlGenerator
    {
        $this->media = $media;

        return $this;
    }

    /**
     * @param Conversion $conversion
     * @return $this|UrlGenerator
     */
    public function setConversion(Conversion $conversion): UrlGenerator
    {
        $this->conversion = $conversion;

        return $this;
    }

    /**
     * @param PathGenerator $pathGenerator
     * @return $this|UrlGenerator
     */
    public function setPathGenerator(PathGenerator $pathGenerator): UrlGenerator
    {
        $this->pathGenerator = $pathGenerator;

        return $this;
    }

    /**
     * @return string
     */
    public function getPathRelativeToRoot(): string
    {
        if (is_null($this->conversion)) {
            return $this->pathGenerator->getPath($this->media).($this->media->file_name);
        }

        return $this->pathGenerator->getPathForConversions($this->media)
                .$this->conversion->getConversionFile($this->media);
    }

    /**
     * @return string
     */
    protected function getDiskName(): string
    {
        return $this->conversion === null
            ? $this->media->disk
            : $this->media->conversions_disk;
    }

    /**
     * @return Filesystem
     */
    protected function getDisk(): Filesystem
    {
        return Storage::disk($this->getDiskName());
    }

    /**
     * @param string $path
     * @return string
     */
    public function versionUrl(string $path = ''): string
    {
        if (! $this->config->get('media-library.version_urls')) {
            return $path;
        }

        return "{$path}?v={$this->media->updated_at->timestamp}";
    }
}
