<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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
     *
     * @param  User   $userAuth
     * @param  User   $userPage
     * @return boolean
     */
    public function edit(User $userAuth, User $userPage)
    {
        return $userAuth->id === $userPage->id;
    }
}
