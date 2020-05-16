<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @modified    5/16/20, 1:27 AM
 *  @name          MediaObserver.php
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 *
 */

namespace App\Observers;

use App\Libraries\Media\Conversions\FileManipulator;
use App\Libraries\Media\MediaCollections\Filesystem;
use App\Models\Media;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Application;

class MediaObserver
{
    /**
     * @param Media $media
     */
    public function creating(Media $media)
    {
        if ($media->shouldSortWhenCreating()) {
            $media->setHighestOrderNumber();
        }
    }

    /**
     * @param Media $media
     */
    public function updating(Media $media)
    {
        if ($media->file_name !== $media->getOriginal('file_name')) {
            /** @var \App\Libraries\Media\MediaCollections\Filesystem $filesystem */
            $filesystem = app(Filesystem::class);

            $filesystem->syncFileNames($media);
        }
    }

    /**
     * @param Media $media
     */
    public function updated(Media $media)
    {
        if (is_null($media->getOriginal('model_id'))) {
            return;
        }

        $original = $media->getOriginal('manipulations');

        if (! $this->isLaravel7orHigher()) {
            $original = json_decode($original, true);
        }

        if ($media->manipulations !== $original) {
            $eventDispatcher = Media::getEventDispatcher();
            Media::unsetEventDispatcher();

            /** @var \App\Libraries\Media\Conversions\FileManipulator $fileManipulator */
            $fileManipulator = app(FileManipulator::class);

            $fileManipulator->createDerivedFiles($media);

            Media::setEventDispatcher($eventDispatcher);
        }
    }

    /**
     * @param Media $media
     */
    public function deleted(Media $media)
    {
        if (in_array(SoftDeletes::class, class_uses_recursive($media))) {
            if (! $media->isForceDeleting()) {
                return;
            }
        }

        /** @var \App\Libraries\Media\MediaCollections\Filesystem $filesystem */
        $filesystem = app(Filesystem::class);

        $filesystem->removeAllFiles($media);
    }

    /**
     * @return bool
     */
    private function isLaravel7orHigher(): bool
    {
        if (Application::VERSION === '7.x-dev') {
            return true;
        }

        if (version_compare(Application::VERSION, '7.0', '>=')) {
            return true;
        }

        return false;
    }
}
