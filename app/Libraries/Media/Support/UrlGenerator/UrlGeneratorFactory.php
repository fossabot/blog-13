<?php

namespace App\Libraries\Media\Support\UrlGenerator;

use App\Exceptions\InvalidUrlGenerator;
use App\Libraries\Media\Conversions\ConversionCollection;
use App\Libraries\Media\Support\PathGenerator\PathGeneratorFactory;
use App\Models\Media;

/**
 * Class UrlGeneratorFactory
 * @package App\Libraries\Media\Support\UrlGenerator
 */
class UrlGeneratorFactory
{
    /**
     * @param Media $media
     * @param string $conversionName
     * @throws InvalidUrlGenerator
     * @throws \App\Exceptions\InvalidConversion
     * @return UrlGenerator
     */
    public static function createForMedia(Media $media, string $conversionName = ''): UrlGenerator
    {
        $urlGeneratorClass = config('media-library.url_generator');

        static::guardAgainstInvalidUrlGenerator($urlGeneratorClass);

        /** @var \App\Libraries\Media\Support\UrlGenerator\UrlGenerator $urlGenerator */
        $urlGenerator = app($urlGeneratorClass);

        $pathGenerator = PathGeneratorFactory::create();

        $urlGenerator
            ->setMedia($media)
            ->setPathGenerator($pathGenerator);

        if ($conversionName !== '') {
            $conversion = ConversionCollection::createForMedia($media)->getByName($conversionName);

            $urlGenerator->setConversion($conversion);
        }

        return $urlGenerator;
    }

    /**
     * @param string $urlGeneratorClass
     * @throws InvalidUrlGenerator
     */
    public static function guardAgainstInvalidUrlGenerator(string $urlGeneratorClass): void
    {
        if (! class_exists($urlGeneratorClass)) {
            throw InvalidUrlGenerator::doesntExist($urlGeneratorClass);
        }

        if (! is_subclass_of($urlGeneratorClass, UrlGenerator::class)) {
            throw InvalidUrlGenerator::doesNotImplementUrlGenerator($urlGeneratorClass);
        }
    }
}
