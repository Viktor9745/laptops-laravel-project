<?php

namespace App\Policies;

use App\Models\Laptop;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LaptopPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Laptop  $laptop
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Laptop $laptop)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return ($user->role->name=='moderator');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Laptop  $laptop
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Laptop $laptop)
    {
        return ($user->role->name=='moderator');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Laptop  $laptop
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Laptop $laptop)
    {
        return ($user->role->name=='moderator');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Laptop  $laptop
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Laptop $laptop)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Laptop  $laptop
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Laptop $laptop)
    {
        //
    }
}
