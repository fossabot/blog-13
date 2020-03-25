<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Carbon;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\MediaCollections\Models\Media as Model;

/**
 * App\Models\Media
 *
 * @property int $id
 * @property string $model_type
 * @property int $model_id
 * @property string $collection_name
 * @property string $name
 * @property string $file_name
 * @property null|string $mime_type
 * @property string $disk
 * @property int $size
 * @property mixed $manipulations
 * @property mixed $custom_properties
 * @property mixed $responsive_images
 * @property string $published_at
 * @property null|int $order_column
 * @property null|Carbon $created_at
 * @property null|Carbon $updated_at
 * @method static Builder|Media newModelQuery()
 * @method static Builder|Media newQuery()
 * @method static Builder|Media query()
 * @method static Builder|Media whereCollectionName($value)
 * @method static Builder|Media whereCreatedAt($value)
 * @method static Builder|Media whereCustomProperties($value)
 * @method static Builder|Media whereDisk($value)
 * @method static Builder|Media whereFileName($value)
 * @method static Builder|Media whereId($value)
 * @method static Builder|Media whereManipulations($value)
 * @method static Builder|Media whereMimeType($value)
 * @method static Builder|Media whereModelId($value)
 * @method static Builder|Media whereModelType($value)
 * @method static Builder|Media whereName($value)
 * @method static Builder|Media whereOrderColumn($value)
 * @method static Builder|Media wherePublishedAt($value)
 * @method static Builder|Media whereResponsiveImages($value)
 * @method static Builder|Media whereSize($value)
 * @method static Builder|Media whereUpdatedAt($value)
 * @mixin Eloquent
 * @property-read Tag[]|Collection $tags
 * @property-read null|int $tags_count
 * @property string|null $uuid
 * @property string|null $conversions_disk
 * @property-read Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read mixed $extension
 * @property-read mixed $human_readable_size
 * @property-read mixed $type
 * @property-read \Illuminate\Database\Eloquent\Model|Eloquent $model
 * @method static Builder|Model ordered()
 * @method static Builder|Media whereConversionsDisk($value)
 * @method static Builder|Media whereUuid($value)
 * @property-read Collection|Model[] $media
 * @property-read int|null $media_count
 */
class Media extends Model
{
    use LogsActivity;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'published_at'
    ];

    /**
     * @return MorphToMany
     */
    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
