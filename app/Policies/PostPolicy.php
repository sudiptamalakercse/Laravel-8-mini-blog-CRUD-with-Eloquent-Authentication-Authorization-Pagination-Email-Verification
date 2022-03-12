<?php

namespace App\Policies;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Admin;
use App\Models\Blogger;


use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

   public function posts_show_for_admin(Admin $admin,Post $post)
    {  
       return $admin->id==$post->admin_id;          
    }

   public function posts_show_for_blogger(Blogger $blogger,Post $post)
    {      
      return $blogger->id==$post->blogger_id;
    }

   public function bloggers_show_for_admin(Admin $admin,Post $post)
   {
     return $admin->id==$post->admin_id; 
   }

    public function admins_show_for_blogger(Blogger $blogger,Post $post)
    {
         return $blogger->id==$post->blogger_id;
    }

    public function view_any_for_admin(Admin $admin)
    {
      if($admin->getTable()=='admins')
      {
          return true;
      }
    }

    public function view_any_for_blogger(Blogger $blogger)
    {
      if($blogger->getTable()=='bloggers')
      {
          return true;
      }
    }

    public function create_post_by_blogger(Blogger $blogger)
    {
      return $this->view_any_for_blogger(Auth::guard('blogger')->user());
    }

    
    public function update_by_admin(Admin $admin, Post $post)
    {
      if($admin->id==$post->admin_id){
       return true;
      }
    }

    public function update_by_blogger(Blogger $blogger, Post $post)
    {
      if($blogger->id==$post->blogger_id){
       return true;
      }
    }
    public function selected_post_approve_or_disapprove_by_admin(Admin $admin, Post $post)
    {
      if($admin->id==$post->admin_id){
       return true;
      }
    }

    public function delete_by_admin(Admin $admin, Post $post)
    {   
      if($admin->id==$post->admin_id){
       return true;
      }    
    }

    public function delete_by_blogger(Blogger $blogger, Post $post)
    {
      if($blogger->id==$post->blogger_id){
       return true;
      }    
    }

}
