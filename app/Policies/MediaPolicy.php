<?php

namespace App\Policies;

use App\Models\Media;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MediaPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine whether the user is admin for all authorization.
     * @param User $user
     * @return bool
     */
    public function before(User $user)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can store a medium.
     * @param User $user
     * @return bool
     */
    public function store(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the medium.
     * @param User $user
     * @param Media $medium
     * @return bool
     */
    public function delete(User $user, Media $medium): bool
    {
        return $user->isAdmin();
    }
}
