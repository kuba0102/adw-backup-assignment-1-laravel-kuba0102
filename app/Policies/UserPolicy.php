<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
    * Determine whether the user is an admin.
    *
    * @param  \App\User  $user
    * @return mixed
    */
    public function addUser(User $user)
    {
      if($user->auth_id == 1)
      {
        return true;
      }
      return false;
    }

    /**
    * Determine whether the user auth level.
    *
    * @param  \App\User  $user
    * @return mixed
    */
    public function OtherUser(User $user)
    {
      if($user->auth_id == 2)
      {
        return true;
      }
      return false;
    }
}
