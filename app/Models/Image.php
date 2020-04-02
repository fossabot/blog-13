<?php

namespace App\Models;

use App\Repositories\Likeable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Storage;

/**
 * App\Models\Image
 *
 * @property int $id
 * @property string $name
 * @property string $imageable_type
 * @property int $imageable_id
 * @property null|\Illuminate\Support\Carbon $created_at
 * @property null|\Illuminate\Support\Carbon $updated_at
 * @property-read \Eloquent|\Illuminate\Database\Eloquent\Model $imageable
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image whereImageableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image whereImageableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Image extends Model
{
    use Likeable;
    /**
     * @var array
     */
    protected $appends  = [
        'url'
    ];
    /**
     * Get the owning imageable model.
     */
    public function image()
    {
        return $this->morphTo();
    }

    /**
     * @return null|string
     */
    public function getUrlAttribute()
    {
        if (empty($this->name)) {
            return null;
        }

        return Storage::url($this->file);
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
