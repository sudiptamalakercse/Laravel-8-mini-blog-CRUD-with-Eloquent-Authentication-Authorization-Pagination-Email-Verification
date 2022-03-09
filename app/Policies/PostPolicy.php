<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\Admin;
use App\Models\Blogger;

use Illuminate\Support\Collection;

use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

public function posts_show_for_admin(Admin $admin,Collection $posts)
    {
        if(count($posts)>0){

        foreach ($posts as $post) {

            return $admin->id==$post->admin_id;
        }

        }   
        else {
            return true;
        }  
    }

public function posts_show_for_blogger(Blogger $blogger,Collection $posts)
    {
        if(count($posts)>0){

        foreach ($posts as $post) {

            return $blogger->id==$post->blogger_id;
        }

        }   
        else {
            return true;
        }  
    }

public function bloggers_show_for_admin(Admin $admin,Collection $posts)
    {
        if(count($posts)>0){

        foreach ($posts as $post) {

            return $admin->id==$post->admin_id;
        }

        }   
        else {
            return true;
        }  
    }

public function admins_show_for_blogger(Blogger $blogger,Collection $posts)
    {
        if(count($posts)>0){

        foreach ($posts as $post) {

            return $blogger->id==$post->blogger_id;
        }

        }   
        else {
            return true;
        }  
    }

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
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Post $post)
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
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Post $post)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Post $post)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Post $post)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Post $post)
    {
        //
    }
}
