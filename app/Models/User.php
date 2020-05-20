<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 */

namespace App\Models;

use App\Libraries\Slug\HasSlug;
use App\Libraries\Slug\SlugOptions;
use App\Libraries\Users\Avatar;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Translation\HasLocalePreference;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable implements HasMedia, MustVerifyEmail, HasLocalePreference
{
    use Notifiable, InteractsWithMedia, HasRoles, HasApiTokens, LogsActivity, HasSlug;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'provider', 'provider_id', 'registered_at', 'api_token'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'registered_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @param null|Media $media
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('large')
            ->width(256)
            ->height(256)
            ->sharpen(10)
            ->withResponsiveImages();


        $this->addMediaConversion('medium')
            ->width(180)
            ->height(180)
            ->sharpen(10)
            ->withResponsiveImages();

        $this->addMediaConversion('small')
            ->width(120)
            ->height(120)
            ->sharpen(10)
            ->withResponsiveImages();

        $this->addMediaConversion('x-small')
            ->width(88)
            ->height(88)
            ->sharpen(10)
            ->withResponsiveImages();
    }


    /**
     * @return SlugOptions
     */
    public function getSlugOptions(): SlugOptions
    {
        // TODO: Implement getSlugOptions() method.
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the user's preferred locale.
     *
     * @return string
     */
    public function preferredLocale()
    {
        return $this->locale;
    }

    /**
     * @return mixed|string
     */
    public function getUrlAttribute(): string
    {
        return $this->slug;
    }

    /**
     * Get gravatar based username
     *
     * @return null|string
     */
    public function getAvatarAttribute()
    {
        if ($this->getMedia('images')->count()) {
            return $this->getMedia('images')[0]->getUrl('x-small');
        }
        return Avatar::get($this);
    }
    /**
     * Return a unique personal access token.
     *
     * @return string
     */
    public static function generate(): string
    {
        do {
            $api_token = \Str::random(60);
        } while (self::where('api_token', $api_token)->exists());

        return $api_token;
    }
    /**
     * Scope a query to only include users registered last week.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeLastWeek(Builder $query): Builder
    {
        return $query->whereBetween('registered_at', [Carbon::now()->subWeeks(1), Carbon::now()])
            ->latest();
    }

    /**
     * Scope a query to order users by latest registered.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeLatest(Builder $query): Builder
    {
        return $query->orderBy('registered_at', 'desc');
    }

    /**
     * Scope a query to filter available author users.
     *
     * @param Builder $query
     * @return mixed
     */
    public function scopeAuthors(Builder $query): Builder
    {
        return $query->whereHas('roles', function ($query) {
            $query->where('roles.name', Role::ROLE_ADMIN)
                ->orWhere('roles.name', Role::ROLE_EDITOR);
        });
    }

    /**
     *
     * Check if the user can be an author
     *
     * @return bool
     */
    public function canBeAuthor(): bool
    {
        return $this->isAdmin() || $this->isEditor();
    }

    /**
     * Check if the user has role admin
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->hasRole(Role::ROLE_ADMIN);
    }

    /**
     * Check if the user has role editor
     *
     * @return bool
     */
    public function isEditor(): bool
    {
        return $this->hasRole(Role::ROLE_EDITOR);
    }

    /**
     * One to one relationship
     * Relation user and profile
     * example: $user->profile
     *
     * @return HasOne
     */
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class, 'user_id');
    }

    /**
     * One to many between users and post
     * every users has many posts
     * example: $user->posts
     *
     * @return HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'user_id');
    }

    /**
     * Return the user's comments
     *
     * @return HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'user_id');
    }


    /**
     * Return the user's likes
     * One to many between user's likes and like
     * Example: user->likes
     *
     * @return HasMany
     */
    public function likes(): HasMany
    {
        return $this->hasMany(Like::class, 'user_id');
    }
}
