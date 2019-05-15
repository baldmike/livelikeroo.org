<?php

namespace App\Policies;

use App\Models\User;
use App\Models\FinReq;
use Illuminate\Auth\Access\HandlesAuthorization;

class FinReqPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the fin req.
     *
     * @param  \App\Models\User  $user
     * @param  \App\FinReq  $finReq
     * @return mixed
     */
    public function view(User $user, FinReq $finReq)
    {
        //
    }

    /**
     * Determine whether the user can create fin reqs.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the fin req.
     *
     * @param  \App\Models\User  $user
     * @param  \App\FinReq  $finReq
     * @return mixed
     */
    public function update(User $user, FinReq $finReq)
    {
        //
    }

    /**
     * Determine whether the user can delete the fin req.
     *
     * @param  \App\Models\User  $user
     * @param  \App\FinReq  $finReq
     * @return mixed
     */
    public function delete(User $user, FinReq $finReq)
    {
        //
    }

    /**
     * Determine whether the user can restore the fin req.
     *
     * @param  \App\Models\User  $user
     * @param  \App\FinReq  $finReq
     * @return mixed
     */
    public function restore(User $user, FinReq $finReq)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the fin req.
     *
     * @param  \App\Models\User  $user
     * @param  \App\FinReq  $finReq
     * @return mixed
     */
    public function forceDelete(User $user, FinReq $finReq)
    {
        //
    }
}
