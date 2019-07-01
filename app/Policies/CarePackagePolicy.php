<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CarePackage;
use Illuminate\Auth\Access\HandlesAuthorization;

class CarePackagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the models care package.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CarePackage  $CarePackage
     * @return mixed
     */
    public function view(User $user, CarePackage $CarePackage)
    {
        if ($user->role === 'admin' || $user->role === 'superadmin') 
        {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can create models care packages.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        // if ($user->role === 'admin')
        // {
        //     return true;
        // }
        
        return false;
    }

    /**
     * Determine whether the user can update the models care package.
     *
     * @param  \App\Models\User  $user
     * @param  \App\CarePackage  $CarePackage
     * @return mixed
     */
    public function update(User $user, CarePackage $CarePackage)
    {
        if ($user->role === 'admin' || $user->role === 'superadmin') 
        {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the models care package.
     *
     * @param  \App\Models\User  $user
     * @param  \App\CarePackage  $CarePackage
     * @return mixed
     */
    public function delete(User $user, CarePackage $CarePackage)
    {
        if ($user->role === 'admin' || $user->role === 'superadmin') 
        {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can restore the models care package.
     *
     * @param  \App\Models\User  $user
     * @param  \App\CarePackage  $CarePackage
     * @return mixed
     */
    public function restore(User $user, CarePackage $CarePackage)
    {
        if ($user->role === 'admin' || $user->role === 'superadmin') 
        {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can permanently delete the models care package.
     *
     * @param  \App\Models\User  $user
     * @param  \App\CarePackage  $CarePackage
     * @return mixed
     */
    public function forceDelete(User $user, CarePackage $CarePackage)
    {
        return false;
    }
}
