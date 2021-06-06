<?php

namespace App\Policies;

use App\Mark;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MarkPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Mark  $mark
     * @return mixed
     */
    public function view(User $user, Mark $mark)
    {
 
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->userHasRole('Admin');


    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Mark  $mark
     * @return mixed
     */
    public function update(User $user, Mark $mark)
    {
        if($user->userHasRole('Admin')){
            return false;
        }

        if($user->teacher->id == $mark->student->classroom->teacher_id){
            return true;
        }

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Mark  $mark
     * @return mixed
     */
    public function delete(User $user, Mark $mark)
    {
        if($user->userHasRole('Admin')){
            return true;
        }

        if($user->teacher->id == $mark->student->classroom->teacher_id){
            return true;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Mark  $mark
     * @return mixed
     */
    public function restore(User $user, Mark $mark)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Mark  $mark
     * @return mixed
     */
    public function forceDelete(User $user, Mark $mark)
    {
        //
    }
}
