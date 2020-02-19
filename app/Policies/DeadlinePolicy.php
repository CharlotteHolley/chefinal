<?php

namespace App\Policies;

use App\User;
use App\Deadline;
use Illuminate\Auth\Access\HandlesAuthorization;

class DeadlinePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the deadline.
     *
     * @param  \App\User  $user
     * @param  \App\Deadline  $deadline
     * @return mixed
     */
    public function update(User $user, Deadline $deadline)
    {
        return $deadline->owner_id == $user->id;
    }
}