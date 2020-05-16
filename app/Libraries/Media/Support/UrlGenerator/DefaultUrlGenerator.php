<?php

namespace App\Libraries\Media\Support\UrlGenerator;

use DateTimeInterface;
use Illuminate\Support\Str;

/**
 * Class DefaultUrlGenerator
 * @package App\Libraries\Media\Support\UrlGenerator
 */
class DefaultUrlGenerator extends BaseUrlGenerator
{
    /**
     * @return string
     */
    public function getUrl(): string
    {
        $url = $this->getDisk()->url($this->getPathRelativeToRoot());

        $url = $this->versionUrl($url);

        return $url;
    }

    /**
     * @param DateTimeInterface $expiration
     * @param array $options
     * @return string
     */
    public function getTemporaryUrl(DateTimeInterface $expiration, array $options = []): string
    {
        return $this->getDisk()->temporaryUrl($this->getPathRelativeToRoot(), $expiration, $options);
    }

    /**
     * @return mixed
     */
    public function getBaseMediaDirectoryUrl()
    {
        return $this->getDisk()->url('/');
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        $adapter = $this->getDisk()->getAdapter();

        $cachedAdapter = '\League\Flysystem\Cached\CachedAdapter';

        if ($adapter instanceof $cachedAdapter) {
            $adapter = $adapter->getAdapter();
        }

        $pathPrefix = $adapter->getPathPrefix();

        return $pathPrefix.$this->getPathRelativeToRoot();
    }

    /**
     * @return string
     */
    public function getResponsiveImagesDirectoryUrl(): string
    {
        $base = Str::finish($this->getBaseMediaDirectoryUrl(), '/');

        $path = $this->pathGenerator->getPathForResponsiveImages($this->media);

        return Str::finish(url($base.$path), '/');
    }
}
