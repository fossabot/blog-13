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
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
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
 */
class Media extends Model
{
    use Likeable;
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends  = [
        'url'
    ];
    /**
     * Get the owning imageable model.
     */
    public function media()
    {
        return $this->morphTo();
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
     * @return string
     */
    public function getImageThumbnailAttribute()
    {
        $file = storage_path('app/public/images/posts/thumbnail/'.$this->file);
//
        if (is_file($file)) {
            return Storage::url('images/posts/thumbnail' .$this->file);
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
