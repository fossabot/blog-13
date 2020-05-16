<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Spatie\MediaLibrary\MediaCollections\Models\Media as Model;
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
 * @property string $model_type
 * @property int $model_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Media whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Media whereModelType($value)
 */
class Media extends Model
{


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
