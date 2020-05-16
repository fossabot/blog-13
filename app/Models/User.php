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
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Passport\Client;
use Laravel\Passport\HasApiTokens;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property null|\Illuminate\Support\Carbon $email_verified_at
 * @property string $password
 * @property null|string $remember_token
 * @property null|\Illuminate\Support\Carbon $created_at
 * @property null|\Illuminate\Support\Carbon $updated_at
 * @property-read DatabaseNotification[]|DatabaseNotificationCollection $notifications
 * @property-read null|int $notifications_count
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $slug
 * @property null|string $api_token
 * @property-read Collection|Comment[] $comments
 * @property-read null|int $comments_count
 * @property-read string $avatar
 * @property-read string $full_name
 * @property-read mixed|string $url
 * @property-read Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read null|int $permissions_count
 * @property-read Collection|Post[] $posts
 * @property-read null|int $posts_count
 * @property-read Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read null|int $roles_count
 * @method static Builder|User authors()
 * @method static Builder|User lastWeek()
 * @method static Builder|User latest()
 * @method static Builder|User permission($permissions)
 * @method static Builder|User role($roles, $guard = null)
 * @method static Builder|User whereApiToken($value)
 * @method static Builder|User whereSlug($value)
 * @property-read Collection|\Spatie\MediaLibrary\Models\Media[] $media
 * @property-read null|int $media_count
 * @property null|\Illuminate\Support\Carbon $registered_at
 * @property null|string $provider
 * @property null|string $provider_id
 * @property-read Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read null|int $activities_count
 * @property-read Client[]|Collection $clients
 * @property-read null|int $clients_count
 * @property-read Collection|Like[] $likes
 * @property-read null|int $likes_count
 * @property-read Collection|\Laravel\Passport\Token[] $tokens
 * @property-read null|int $tokens_count
 * @method static Builder|User whereProvider($value)
 * @method static Builder|User whereProviderId($value)
 * @method static Builder|User whereRegisteredAt($value)
 * @property-read \App\Models\Media $image
 */
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

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('avatar')
            ->singleFile();
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
     * Get the user's full_name titleized.
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return Str::title($this->name);
    }

    /**
     * @return mixed|string
     */
    public function getUrlAttribute(): string
    {
        return $this->slug;
    }

    /**
     * @return null|string
     */
    public function getAvatarAttribute()
    {
        return Avatar::get($this);
    }
    /**
     * Return a unique personal access token.
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
