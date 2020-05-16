<?php

namespace App\Libraries\Media\Support\UrlGenerator;

use App\Libraries\Media\Conversions\Conversion;
use App\Libraries\Media\Support\PathGenerator\PathGenerator;
use App\Models\Media;
use DateTimeInterface;

/**
 * Interface UrlGenerator
 * @package App\Libraries\Media\Support\UrlGenerator
 */
interface UrlGenerator
{
    /**
     * @return string
     */
    public function getUrl(): string;

    /**
     * @return string
     */
    public function getPath(): string;

    /**
     * @param Media $media
     * @return $this
     */
    public function setMedia(Media $media): self;

    /**
     * @param Conversion $conversion
     * @return $this
     */
    public function setConversion(Conversion $conversion): self;

    /**
     * @param PathGenerator $pathGenerator
     * @return $this
     */
    public function setPathGenerator(PathGenerator $pathGenerator): self;

    /**
     * @param DateTimeInterface $expiration
     * @param array $options
     * @return string
     */
    public function getTemporaryUrl(DateTimeInterface $expiration, array $options = []): string;

    /**
     * @return string
     */
    public function getResponsiveImagesDirectoryUrl(): string;
}
