<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @modified    5/16/20, 12:52 AM
 *  @name          GenerateResponsiveImagesJob.php
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 *
 */

namespace App\Jobs;

use App\Libraries\Media\ResponsiveImages\ResponsiveImageGenerator;
use App\Models\Media;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/**
 * Class GenerateResponsiveImagesJob
 * @package App\Jobs
 */
class GenerateResponsiveImagesJob implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels, Queueable;

    /**
     * @var Media
     */
    protected Media $media;

    /**
     * GenerateResponsiveImagesJob constructor.
     * @param Media $media
     */
    public function __construct(Media $media)
    {
        $this->media = $media;
    }

    /**
     * @return bool
     */
    public function handle(): bool
    {
        /** @var \App\Libraries\Media\ResponsiveImages\ResponsiveImageGenerator $responsiveImageGenerator */
        $responsiveImageGenerator = app(ResponsiveImageGenerator::class);

        $responsiveImageGenerator->generateResponsiveImages($this->media);

        return true;
    }
}
