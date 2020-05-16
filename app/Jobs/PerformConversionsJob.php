<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @modified    5/16/20, 12:52 AM
 *  @name          PerformConversionsJob.php
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 *
 */

namespace App\Jobs;

use App\Libraries\Media\Conversions\ConversionCollection;
use App\Libraries\Media\Conversions\FileManipulator;
use App\Models\Media;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/**
 * Class PerformConversionsJob
 * @package App\Jobs
 */
class PerformConversionsJob implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels, Queueable;

    /**
     * @var ConversionCollection
     */
    protected ConversionCollection $conversions;

    /**
     * @var Media
     */
    protected Media $media;

    /**
     * @var bool
     */
    protected bool $onlyMissing;

    /**
     * PerformConversionsJob constructor.
     * @param ConversionCollection $conversions
     * @param Media $media
     * @param bool $onlyMissing
     */
    public function __construct(ConversionCollection $conversions, Media $media, bool $onlyMissing = false)
    {
        $this->conversions = $conversions;

        $this->media = $media;

        $this->onlyMissing = $onlyMissing;
    }

    /**
     * @param FileManipulator $fileManipulator
     * @return bool
     */
    public function handle(FileManipulator $fileManipulator): bool
    {
        $fileManipulator->performConversions($this->conversions, $this->media, $this->onlyMissing);

        return true;
    }
}
