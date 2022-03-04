<?php
namespace App\CustomClass;

use Illuminate\Support\Facades\Auth;


class User
{

    private function admin_auth(){
       return Auth::guard('admin')->user();
    }//end

    private function blogger_auth(){
       return Auth::guard('blogger')->user();
    }//end

    public static function pending_updatePending_approved_disapproved_user_list($user_type,$post_approved,$update_approved,$post_pending)
    {
       
      if($user_type=='admin'){
            $user=self::admin_auth();
          }
        elseif($user_type=='blogger'){
             $user=self::blogger_auth();
          }
        if($user_type=='admin')
         {
          $distinct_user='blogger';
         }
         elseif($user_type=='blogger')
         {
          $distinct_user='admin';
         } 
          
        $posts=$user
               ->posts()
               ->where('post_approved',$post_approved)
               ->where('update_approved',$update_approved)   
               ->where('post_pending',$post_pending)       
               ->distinct()
               ->get([$distinct_user.'_id']); 

        if($post_approved==0 && $update_approved==0 && $post_pending==1 )
           {
              $blade_file='pending_'.$distinct_user;
            }
         elseif($post_approved==1 && $update_approved==0 && $post_pending==0)
           {
              $blade_file='update_pending_'.$distinct_user;
           }
         elseif($post_approved==1 && $update_approved==1 && $post_pending==0)
           {
              $blade_file='approved_'.$distinct_user;
           }
         elseif($post_approved==0 && $update_approved==0 && $post_pending==0)
           {
               $blade_file='disapproved_'.$distinct_user;
              
           }
        return view($user_type.'.'.$blade_file,['posts'=>$posts]); 
 
    }
}