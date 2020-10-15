<?php

namespace App\Policies;

use App\Alacarte;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AlacartePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any alacartes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the alacarte.
     *
     * @param  \App\User  $user
     * @param  \App\Alacarte  $alacarte
     * @return mixed
     */
    public function view(User $user, Alacarte $alacarte)
    {
        //
    }

    /**
     * Determine whether the user can create alacartes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role == 'admin' || $user->role == 'user';
    }

    /**
     * Determine whether the user can update the alacarte.
     *
     * @param  \App\User  $user
     * @param  \App\Alacarte  $alacarte
     * @return mixed
     */
    public function update(User $user, Alacarte $alacarte)
    {
        return $user->role == 'admin' || $user->role == 'user';
    }

    /**
     * Determine whether the user can delete the alacarte.
     *
     * @param  \App\User  $user
     * @param  \App\Alacarte  $alacarte
     * @return mixed
     */
    public function delete(User $user, Alacarte $alacarte)
    {
        return $user->role == 'admin' || $user->role == 'user';
    }

    /**
     * Determine whether the user can restore the alacarte.
     *
     * @param  \App\User  $user
     * @param  \App\Alacarte  $alacarte
     * @return mixed
     */
    public function restore(User $user, Alacarte $alacarte)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the alacarte.
     *
     * @param  \App\User  $user
     * @param  \App\Alacarte  $alacarte
     * @return mixed
     */
    public function forceDelete(User $user, Alacarte $alacarte)
    {
        //
    }
}
