<?php

namespace App\Policies;

use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
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
     * @see //qiita.com/inaka_phper/items/09e730bf5a0abeb9e51a
     * @param  \App\User $user
     * @param  $ability
     * @return mixed
     */
    public function before(User $user, $ability)
    {
        return $user->isAdmin() ? true : null;
    }

    /**
     *
     * @param  User   $user
     * @param  Post   $post
     * @return boolean
     */
    public function edit(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }
}
