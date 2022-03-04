<?php
namespace App\CustomClass;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BloggerController;


class User
{

    private function admin_auth(){
       return Auth::guard('admin')->user();
    }//end

    private function blogger_auth(){
       return Auth::guard('blogger')->user();
    }//end

    public static function pending_updatePending_approved_disapproved_user_list($user_type,$post_approved,$update_approved,$post_pending,$count)
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
      
        if($count==true)
        {
            return  count($posts);
        }

        return view($user_type.'.'.$blade_file,['posts'=>$posts]); 
 
    }


   public static function dashboard($user_type){
        if($user_type=='admin')
        {
           $obj=new AdminController();
           $val='blogger';
        }
        elseif($user_type=='blogger')
        {
           $obj=new BloggerController();;
           $val='admin';
        }
        
        $approved_user='approved_'.$val;
        $disapproved_user='disapproved_'.$val;
        $pending_user='pending_'.$val;
        $update_pending_user='update_pending_'.$val;

        $count_pending_post=$obj->pending_post(true);
        $count_update_pending_post=$obj->update_pending_post(true);
        $count_approved_post=$obj->approved_post(true);
        $count_disapproved_post=$obj->disapproved_post(true);
        $count_approved_user=$obj->$approved_user(true);
        $count_disapproved_user=$obj->$disapproved_user(true);
        $count_pending_user=$obj->$pending_user(true);
        $count_update_pending_user=$obj->$update_pending_user(true);

       return view($user_type.'.'.$user_type.'_dashboard',
      [
         'count_pending_post'=>$count_pending_post,
         'count_update_pending_post'=>$count_update_pending_post,
         'count_approved_post'=>$count_approved_post,
         'count_disapproved_post'=>$count_disapproved_post,
         'count_approved_'.$val=>$count_approved_user,
         'count_disapproved_'.$val=>$count_disapproved_user,
         'count_pending_'.$val=>$count_pending_user,
         'count_update_pending_'.$val=>$count_update_pending_user
      ]
      );

        }


}