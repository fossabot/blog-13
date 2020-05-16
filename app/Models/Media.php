<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 */

namespace App\Models;

use App\Libraries\Like\Likeable;
use App\Libraries\Media\Conversions\Conversion;
use App\Libraries\Media\Conversions\ConversionCollection;
use App\Libraries\Media\Conversions\ImageGenerators\ImageGeneratorFactory;
use App\Libraries\Media\HasMedia;
use App\Libraries\Media\MediaCollections\Filesystem;
use App\Libraries\Media\MediaCollections\HtmlableMedia;
use App\Libraries\Media\MediaCollections\Models\Concerns\CustomMediaProperties;
use App\Libraries\Media\MediaCollections\Models\Concerns\HasUuid;
use App\Libraries\Media\MediaCollections\Models\Concerns\IsSorted;
use App\Libraries\Media\ResponsiveImages\RegisteredResponsiveImages;
use App\Libraries\Media\Support\File;
use App\Libraries\Media\Support\TemporaryDirectory;
use App\Libraries\Media\Support\UrlGenerator\UrlGeneratorFactory;
use DateTimeInterface;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Storage;

/**
 * App\Models\Media
 *
 * @property int $id
 * @property string $name
 * @property string $imageable_type
 * @property int $imageable_id
 * @property null|\Illuminate\Support\Carbon $created_at
 * @property null|\Illuminate\Support\Carbon $updated_at
 * @property-read \Eloquent|\Illuminate\Database\Eloquent\Model $imageable
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Media newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Media newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Media query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Media whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Media whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Media whereImageableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Media whereImageableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Media whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Media whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $file
 * @property null|string $mime
 * @property null|int $size
 * @property string $image_type
 * @property int $image_id
 * @property-read null|string $url
 * @property-read \Eloquent|\Illuminate\Database\Eloquent\Model $image
 * @property-read \App\Models\Like[]|\Illuminate\Database\Eloquent\Collection $likes
 * @property-read null|int $likes_count
 * @property-read \App\Models\Tag[]|\Illuminate\Database\Eloquent\Collection $tags
 * @property-read null|int $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Media whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Media whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Media whereImageType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Media whereMime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Media whereSize($value)
 * @property string $media_type
 * @property int $media_id
 * @property-read \Eloquent|\Illuminate\Database\Eloquent\Model $media
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Media whereMediaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Media whereMediaType($value)
 * @property null|string $uuid
 * @property string $collection_name
 * @property string $file_name
 * @property null|string $mime_type
 * @property string $disk
 * @property null|string $conversions_disk
 * @property array $manipulations
 * @property array $custom_properties
 * @property array $responsive_images
 * @property null|int $order_column
 * @property-read string $extension
 * @property-read string $human_readable_size
 * @property-read string $type
 * @property-read \Eloquent|\Illuminate\Database\Eloquent\Model $model
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Media ordered()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Media whereCollectionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Media whereConversionsDisk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Media whereCustomProperties($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Media whereDisk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Media whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Media whereManipulations($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Media whereMimeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Media whereOrderColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Media whereResponsiveImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Media whereUuid($value)
 */
class Media extends Model implements Responsable, Htmlable
{
    use Likeable,
        IsSorted,
        CustomMediaProperties,
        HasUuid;

    /**
     * @var string
     */
    protected $table = 'media';

    /**
     *
     */
    const TYPE_OTHER = 'other';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var string[]
     */
    protected $casts = [
        'manipulations' => 'array',
        'custom_properties' => 'array',
        'responsive_images' => 'array',
    ];

    /**
     * @return MorphTo
     */
    public function model(): MorphTo
    {
        return $this->morphTo();
    }


    /**
     * @param string $conversionName
     * @return string
     */
    public function getFullUrl(string $conversionName = ''): string
    {
        return url($this->getUrl($conversionName));
    }

    /**
     * @param string $conversionName
     * @return string
     */
    public function getUrl(string $conversionName = ''): string
    {
        $urlGenerator = UrlGeneratorFactory::createForMedia($this, $conversionName);

        return $urlGenerator->getUrl();
    }

    /**
     * @param DateTimeInterface $expiration
     * @param string $conversionName
     * @param array $options
     * @return string
     */
    public function getTemporaryUrl(DateTimeInterface $expiration, string $conversionName = '', array $options = []): string
    {
        $urlGenerator = UrlGeneratorFactory::createForMedia($this, $conversionName);

        return $urlGenerator->getTemporaryUrl($expiration, $options);
    }

    /**
     * @param string $conversionName
     * @return string
     */
    public function getPath(string $conversionName = ''): string
    {
        $urlGenerator = UrlGeneratorFactory::createForMedia($this, $conversionName);

        return $urlGenerator->getPath();
    }

    /**
     * @return string
     */
    public function getTypeAttribute(): string
    {
        $type = $this->getTypeFromExtension();

        if ($type !== self::TYPE_OTHER) {
            return $type;
        }

        return $this->getTypeFromMime();
    }

    /**
     * @return string
     */
    public function getTypeFromExtension(): string
    {
        $imageGenerator = ImageGeneratorFactory::forExtension($this->extension);

        return $imageGenerator
            ? $imageGenerator->getType()
            : static::TYPE_OTHER;
    }

    /**
     * @return string
     */
    public function getTypeFromMime(): string
    {
        $imageGenerator = ImageGeneratorFactory::forMimeType($this->mime_type);

        return $imageGenerator
            ? $imageGenerator->getType()
            : static::TYPE_OTHER;
    }

    /**
     * @return string
     */
    public function getExtensionAttribute(): string
    {
        return pathinfo($this->file_name, PATHINFO_EXTENSION);
    }

    /**
     * @return string
     */
    public function getHumanReadableSizeAttribute(): string
    {
        return File::getHumanReadableSize($this->size);
    }

    /**
     * @return string
     */
    public function getDiskDriverName(): string
    {
        return strtolower(config("filesystems.disks.{$this->disk}.driver"));
    }

    /**
     * @return string
     */
    public function getConversionsDiskDriverName(): string
    {
        $diskName = $this->conversions_disk ?? $this->disk;

        return strtolower(config("filesystems.disks.{$diskName}.driver"));
    }

    /**
     * @param string $propertyName
     * @return bool
     */
    public function hasCustomProperty(string $propertyName): bool
    {
        return Arr::has($this->custom_properties, $propertyName);
    }

    /**
     * Get the value of custom property with the given name.
     *
     * @param string $propertyName
     * @param mixed $default
     *
     * @return mixed
     */
    public function getCustomProperty(string $propertyName, $default = null)
    {
        return Arr::get($this->custom_properties, $propertyName, $default);
    }

    /**
     * @param string $name
     * @param mixed $value
     *
     * @return \App\Libraries\Media\MediaCollections\Models\Media
     */
    public function setCustomProperty(string $name, $value): self
    {
        $customProperties = $this->custom_properties;

        Arr::set($customProperties, $name, $value);

        $this->custom_properties = $customProperties;

        return $this;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function forgetCustomProperty(string $name): self
    {
        $customProperties = $this->custom_properties;

        Arr::forget($customProperties, $name);

        $this->custom_properties = $customProperties;

        return $this;
    }

    /**
     * @return array
     */
    public function getMediaConversionNames(): array
    {
        $conversions = ConversionCollection::createForMedia($this);

        return $conversions->map(fn (Conversion $conversion) => $conversion->getName())->toArray();
    }

    /**
     * @param string $conversionName
     * @return bool
     */
    public function hasGeneratedConversion(string $conversionName): bool
    {
        $generatedConversions = $this->getGeneratedConversions();

        return $generatedConversions[$conversionName] ?? false;
    }

    /**
     * @param string $conversionName
     * @param bool $generated
     * @return $this
     */
    public function markAsConversionGenerated(string $conversionName, bool $generated): self
    {
        $this->setCustomProperty("generated_conversions.{$conversionName}", $generated);

        $this->save();

        return $this;
    }

    /**
     * @return Collection
     */
    public function getGeneratedConversions(): Collection
    {
        return collect($this->getCustomProperty('generated_conversions', []));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Symfony\Component\HttpFoundation\Response|\Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function toResponse($request)
    {
        $downloadHeaders = [
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Content-Type' => $this->mime_type,
            'Content-Length' => $this->size,
            'Content-Disposition' => 'attachment; filename="'.$this->file_name.'"',
            'Pragma' => 'public',
        ];

        return response()->stream(function () {
            $stream = $this->stream();

            fpassthru($stream);

            if (is_resource($stream)) {
                fclose($stream);
            }
        }, 200, $downloadHeaders);
    }

    /**
     * @param string $conversionName
     * @return array
     */
    public function getResponsiveImageUrls(string $conversionName = ''): array
    {
        return $this->responsiveImages($conversionName)->getUrls();
    }

    /**
     * @param string $conversionName
     * @return bool
     */
    public function hasResponsiveImages(string $conversionName = ''): bool
    {
        return count($this->getResponsiveImageUrls($conversionName)) > 0;
    }

    /**
     * @param string $conversionName
     * @return string
     */
    public function getSrcset(string $conversionName = ''): string
    {
        return $this->responsiveImages($conversionName)->getSrcset();
    }

    /**
     * @param HasMedia $model
     * @param string $collectionName
     * @param string $diskName
     * @throws \Exception
     * @return $this
     */
    public function move(HasMedia $model, $collectionName = 'default', string $diskName = ''): self
    {
        $newMedia = $this->copy($model, $collectionName, $diskName);

        $this->delete();

        return $newMedia;
    }

    /**
     * @param HasMedia $model
     * @param string $collectionName
     * @param string $diskName
     * @throws \App\Libraries\Media\MediaCollections\Exceptions\FileDoesNotExist
     * @throws \App\Libraries\Media\MediaCollections\Exceptions\FileIsTooBig
     * @return $this
     */
    public function copy(HasMedia $model, $collectionName = 'default', string $diskName = ''): self
    {
        $temporaryDirectory = TemporaryDirectory::create();

        $temporaryFile = $temporaryDirectory->path('/').DIRECTORY_SEPARATOR.$this->file_name;

        /** @var \App\Libraries\Media\MediaCollections\Filesystem $filesystem */
        $filesystem = app(Filesystem::class);

        $filesystem->copyFromMediaLibrary($this, $temporaryFile);

        $newMedia = $model
            ->addMedia($temporaryFile)
            ->usingName($this->name)
            ->withCustomProperties($this->custom_properties)
            ->toMediaCollection($collectionName, $diskName);

        $temporaryDirectory->delete();

        return $newMedia;
    }

    /**
     * @param string $conversionName
     * @return RegisteredResponsiveImages
     */
    public function responsiveImages(string $conversionName = ''): RegisteredResponsiveImages
    {
        return new RegisteredResponsiveImages($this, $conversionName);
    }

    /**
     * @return null|resource
     */
    public function stream()
    {
        /** @var \App\Libraries\Media\MediaCollections\Filesystem $filesystem */
        $filesystem = app(Filesystem::class);

        return $filesystem->getStream($this);
    }

    /**
     * @return array|string
     */
    public function toHtml()
    {
        return $this->img()->toHtml();
    }

    /**
     * @param string $conversionName
     * @param array $extraAttributes
     * @return HtmlableMedia
     */
    public function img(string $conversionName = '', $extraAttributes = []): HtmlableMedia
    {
        return (new HtmlableMedia($this))
            ->conversion($conversionName)
            ->attributes($extraAttributes);
    }

    /**
     * @param mixed ...$arguments
     * @return HtmlableMedia
     */
    public function __invoke(...$arguments): HtmlableMedia
    {
        return $this->img(...$arguments);
    }

    /**
     * @return null|string
     */
    public function getUrlAttribute()
    {
        if (empty($this->name)) {
            return Storage::url('images/posts/blog208.jpg');
        }

        return Storage::url('images/posts/'.$this->file);
    }

    /**
     * many to many polymorphic relationship between tags and images
     * every image has one or many tags
     * example:
     *
     * @foreach($image->tags as $tag)
     * $tag->title
     *
     * @return MorphToMany
     */
    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
