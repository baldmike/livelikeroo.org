<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Donation;
use Illuminate\Auth\Access\HandlesAuthorization;

class DonationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the donation.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Donation  $donation
     * @return mixed
     */
    public function view(User $user, Donation $donation)
    {
        if ($user->role === 'admin') 
        {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can create donations.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the donation.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Donation  $donation
     * @return mixed
     */
    public function update(User $user, Donation $donation)
    {
        if ($user->role === 'admin') 
        {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the donation.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Donation  $donation
     * @return mixed
     */
    public function delete(User $user, Donation $donation)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the donation.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Donation  $donation
     * @return mixed
     */
    public function restore(User $user, Donation $donation)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the donation.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Donation  $donation
     * @return mixed
     */
    public function forceDelete(User $user, Donation $donation)
    {
        return false;
    }
}
