<?php

namespace App\Libraries\Media\MediaCollections\Commands;

use App\MediaCollections\MediaRepository;
use App\Models\Media;
use Illuminate\Console\Command;
use Illuminate\Console\ConfirmableTrait;
use Illuminate\Database\Eloquent\Collection;

class ClearCommand extends Command
{
    use ConfirmableTrait;

    protected $signature = 'media-library:clear {modelType?} {collectionName?}
    {-- force : Force the operation to run when in production}';

    protected $description = 'Delete all items in a media collection.';

    protected MediaRepository $mediaRepository;

    public function handle(MediaRepository $mediaRepository)
    {
        $this->mediaRepository = $mediaRepository;

        if (! $this->confirmToProceed()) {
            return;
        }

        $mediaItems = $this->getMediaItems();

        $progressBar = $this->output->createProgressBar($mediaItems->count());

        $mediaItems->each(function (Media $media) use ($progressBar) {
            $media->delete();
            $progressBar->advance();
        });

        $progressBar->finish();

        $this->info('All done!');
    }

    public function getMediaItems(): Collection
    {
        $modelType = $this->argument('modelType');
        $collectionName = $this->argument('collectionName');

        if (! is_null($modelType) && ! is_null($collectionName)) {
            return $this->mediaRepository->getByModelTypeAndCollectionName(
                $modelType,
                $collectionName
            );
        }

        if (! is_null($modelType)) {
            return $this->mediaRepository->getByModelType($modelType);
        }

        if (! is_null($collectionName)) {
            return $this->mediaRepository->getByCollectionName($collectionName);
        }

        return $this->mediaRepository->all();
    }
}
