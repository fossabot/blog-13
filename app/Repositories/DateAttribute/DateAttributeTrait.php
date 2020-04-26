<?php


namespace App\Repositories\DateAttribute;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

/**
 * Trait DateAttributeTrait
 * @package App\Repositories\DateAttribute
 */
trait DateAttributeTrait
{
    /**
     * Scope a query to order posts by latest posted
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeLatest(Builder $query): Builder
    {
        return $query->orderBy('published_at', 'desc');
    }

    /**
     * Scope a query to only include posts posted last month.
     *
     * @param Builder $query
     * @param int $limit
     * @return Builder
     */
    public function scopeLastMonth(Builder $query, int $limit = 5): Builder
    {
        return $query->whereBetween('published_at', [Carbon::now()->subMonth(), Carbon::now()])
            ->latest()
            ->limit($limit);
    }

    /**
     * Scope a query to only include posts posted last week.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeLastWeek(Builder $query): Builder
    {
        return $query->whereBetween('published_at', [Carbon::now()->subWeeks(1), now()])
            ->latest();
    }

    /**
     * get publish date attribute
     *
     * @param $value
     * @throws \Exception
     * @return mixed
     */
    public function getPublishDateAttribute($value): string
    {
        return $this->attributes['published_at'] = Carbon::parse($value)->format('Y-m-d');
    }

    /**
     * get publish time attribute
     *
     * @param $value
     * @throws \Exception
     * @return mixed
     */
    public function getPublishTimeAttribute($value): string
    {
        return $this->attributes['published_at'] = Carbon::parse($value)->format('H:i:s A');
    }

    /**
     * get publish date attribute
     *
     * @param $value
     * @return string
     */
    public function getDateAttribute($value): string
    {
        return $this->attributes['published_at'] = Carbon::parse($value)->format('d');
    }

    /**
     * get publish month attribute
     *
     * @param $value
     * @return string
     */
    public function getMonthAttribute($value): string
    {
        return $this->attributes['published_at'] = Carbon::parse($value)->format('M');
    }

    /**
     * get publish time elapsed attribute
     *
     * @return string
     */
    public function getTimeElapsedAttribute(): string
    {
        return  Carbon::parse($this->attributes['published_at'])->diffForHumans();
    }

}
