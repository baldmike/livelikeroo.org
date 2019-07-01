<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Message;
use Illuminate\Auth\Access\HandlesAuthorization;

class MessagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the message.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Message  $message
     * @return mixed
     */
    public function view(User $user, Message $message)
    {
        if ($user->role === 'admin' || $user->role === 'superadmin') 
        {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can create messages.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->role === 'admin' || $user->role === 'superadmin') 
        {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the message.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Message  $message
     * @return mixed
     */
    public function update(User $user, Message $message)
    {
        if ($user->role === 'admin' || $user->role === 'superadmin') 
        {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the message.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Message  $message
     * @return mixed
     */
    public function delete(User $user, Message $message)
    {
        if ($user->role === 'admin' || $user->role === 'superadmin') 
        {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can restore the message.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Message  $message
     * @return mixed
     */
    public function restore(User $user, Message $message)
    {
        if ($user->role === 'admin' || $user->role === 'superadmin') 
        {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can permanently delete the message.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Message  $message
     * @return mixed
     */
    public function forceDelete(User $user, Message $message)
    {
        return false;
    }
}
