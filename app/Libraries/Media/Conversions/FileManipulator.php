<?php

namespace App\Libraries\Media\Conversions;

use App\Libraries\Media\Conversions\Events\ConversionHasBeenCompleted;
use App\Libraries\Media\Conversions\Events\ConversionWillStart;
use App\Libraries\Media\Conversions\ImageGenerators\ImageGeneratorFactory;
use App\Libraries\Media\Conversions\Jobs\PerformConversionsJob;
use App\Libraries\Media\MediaCollections\Filesystem;
use App\Libraries\Media\ResponsiveImages\ResponsiveImageGenerator;
use App\Libraries\Media\Support\ImageFactory;
use App\Libraries\Media\Support\TemporaryDirectory;
use App\Models\Media;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Class FileManipulator
 * @package App\Libraries\Media\Conversions
 */
class FileManipulator
{
    /**
     * @param Media $media
     * @param array $only
     * @param bool $onlyMissing
     */
    public function createDerivedFiles(Media $media, array $only = [], bool $onlyMissing = false): void
    {
        $profileCollection = ConversionCollection::createForMedia($media);

        if (! empty($only)) {
            $profileCollection = $profileCollection->filter(
                fn (Conversion $conversion) => in_array($conversion->getName(), $only)
            );
        }

        $this->performConversions(
            $profileCollection->getNonQueuedConversions($media->collection_name),
            $media,
            $onlyMissing
        );

        $queuedConversions = $profileCollection->getQueuedConversions($media->collection_name);

        if ($queuedConversions->isNotEmpty()) {
            $this->dispatchQueuedConversions($media, $queuedConversions, $onlyMissing);
        }
    }

    /**
     * @param ConversionCollection $conversions
     * @param Media $media
     * @param bool $onlyMissing
     */
    public function performConversions(ConversionCollection $conversions, Media $media, bool $onlyMissing = false)
    {
        if ($conversions->isEmpty()) {
            return;
        }

        $imageGenerator = ImageGeneratorFactory::forMedia($media);

        if (! $imageGenerator) {
            return;
        }

        $temporaryDirectory = TemporaryDirectory::create();

        $copiedOriginalFile = $this->filesystem()->copyFromMediaLibrary(
            $media,
            $temporaryDirectory->path(Str::random(16).'.'.$media->extension)
        );

        $conversions
            ->reject(function (Conversion $conversion) use ($onlyMissing, $media) {
                $relativePath = $media->getPath($conversion->getName());

                $rootPath = config("filesystems.disks.{$media->disk}.root");

                if ($rootPath) {
                    $relativePath = str_replace($rootPath, '', $relativePath);
                }

                return $onlyMissing && Storage::disk($media->disk)->exists($relativePath);
            })
            ->each(function (Conversion $conversion) use ($media, $imageGenerator, $copiedOriginalFile) {
                event(new ConversionWillStart($media, $conversion, $copiedOriginalFile));

                $copiedOriginalFile = $imageGenerator->convert($copiedOriginalFile, $conversion);

                $manipulationResult = $this->performManipulations($media, $conversion, $copiedOriginalFile);

                $newFileName = $conversion->getConversionFile($media);

                $renamedFile = $this->renameInLocalDirectory($manipulationResult, $newFileName);

                if ($conversion->shouldGenerateResponsiveImages()) {
                    /** @var ResponsiveImageGenerator $responsiveImageGenerator */
                    $responsiveImageGenerator = app(ResponsiveImageGenerator::class);

                    $responsiveImageGenerator->generateResponsiveImagesForConversion(
                        $media,
                        $conversion,
                        $renamedFile
                    );
                }

                $this->filesystem()->copyToMediaLibrary($renamedFile, $media, 'conversions');

                $media->markAsConversionGenerated($conversion->getName(), true);

                event(new ConversionHasBeenCompleted($media, $conversion));
            });

        $temporaryDirectory->delete();
    }

    /**
     * @param Media $media
     * @param Conversion $conversion
     * @param string $imageFile
     * @return string
     */
    public function performManipulations(Media $media, Conversion $conversion, string $imageFile): string
    {
        if ($conversion->getManipulations()->isEmpty()) {
            return $imageFile;
        }

        $conversionTempFile = $this->getConversionTempFileName($media, $conversion, $imageFile);

        File::copy($imageFile, $conversionTempFile);

        $supportedFormats = ['jpg', 'pjpg', 'png', 'gif'];
        if ($conversion->shouldKeepOriginalImageFormat() && in_array($media->extension, $supportedFormats)) {
            $conversion->format($media->extension);
        }

        ImageFactory::load($conversionTempFile)
            ->manipulate($conversion->getManipulations())
            ->save();

        return $conversionTempFile;
    }

    /**
     * @param Media $media
     * @param ConversionCollection $queuedConversions
     * @param bool $onlyMissing
     */
    protected function dispatchQueuedConversions(Media $media, ConversionCollection $queuedConversions, bool $onlyMissing = false)
    {
        $performConversionsJobClass = config('media-library.jobs.perform_conversions', PerformConversionsJob::class);

        $job = new $performConversionsJobClass($queuedConversions, $media, $onlyMissing);

        if ($customQueue = config('media-library.queue_name')) {
            $job->onQueue($customQueue);
        }

        dispatch($job);
    }

    /**
     * @param string $fileNameWithDirectory
     * @param string $newFileNameWithoutDirectory
     * @return string
     */
    protected function renameInLocalDirectory(
        string $fileNameWithDirectory,
        string $newFileNameWithoutDirectory
    ): string {
        $targetFile = pathinfo($fileNameWithDirectory, PATHINFO_DIRNAME).'/'.$newFileNameWithoutDirectory;

        rename($fileNameWithDirectory, $targetFile);

        return $targetFile;
    }

    /**
     * @return Filesystem
     */
    protected function filesystem(): Filesystem
    {
        return app(Filesystem::class);
    }

    /**
     * @param Media $media
     * @param Conversion $conversion
     * @param string $imageFile
     * @return string
     */
    protected function getConversionTempFileName(Media $media, Conversion $conversion, string $imageFile): string
    {
        $directory = pathinfo($imageFile, PATHINFO_DIRNAME);

        $fileName = Str::random(16)."{$conversion->getName()}.{$media->extension}";

        return "{$directory}/{$fileName}";
    }
}
