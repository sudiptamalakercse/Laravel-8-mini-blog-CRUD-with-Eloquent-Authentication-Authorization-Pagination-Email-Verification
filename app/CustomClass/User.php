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
               ->get();
    
              

   foreach ($posts as $post) {

   
    if($user_type=='admin'){
      
       if ($user->cannot('bloggers_show_for_admin', $post)) {
            abort(403);
         }
        
       }
        
       
       elseif($user_type=='blogger'){
       
         if ($user->cannot('admins_show_for_blogger', $post)) {
            abort(403);
         }

       }

      }

              $posts=$user
               ->posts()
               ->where('post_approved',$post_approved)
               ->where('update_approved',$update_approved)   
               ->where('post_pending',$post_pending)  
               ->select($distinct_user.'_id')     
               ->distinct()
               ->get();
              
              $unique_users_count=count($posts);

              $posts=$user
               ->posts()
               ->where('post_approved',$post_approved)
               ->where('update_approved',$update_approved)   
               ->where('post_pending',$post_pending)  
               ->select($distinct_user.'_id')     
               ->distinct()
               ->simplePaginate(2);
   
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
            return  $unique_users_count;
        }

        return view($user_type.'.'.$blade_file,['posts'=>$posts,'unique_users_count'=>$unique_users_count]); 
 
    }


   public static function dashboard($user_type){

       function array_push_assoc($array, $key, $value){
       $array[$key] = $value;
       return $array;
       }

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
       
        Global $units;
        $units=[];

        function units_func($title,$count,$link){

        global $units;

        $unit=[]; 

        $unit=array_push_assoc($unit, 'title',$title);
        $unit=array_push_assoc($unit, 'count',$count);
        $unit=array_push_assoc($unit, 'link',$link);
        
        array_push($units,$unit); 

        };

        $count_pending_post=$obj->pending_post(true);
        $link=route($user_type.'.posts.pending');
        units_func('Pending Posts',$count_pending_post,$link);

        $count_update_pending_post=$obj->update_pending_post(true);
        $link=route($user_type.'.posts.update_pending');
        units_func('Updated Pending Posts',$count_update_pending_post,$link);
   
        $count_approved_post=$obj->approved_post(true);
        $link=route($user_type.'.posts.approved');
        units_func('Approved Posts',$count_approved_post,$link);

        $count_disapproved_post=$obj->disapproved_post(true);
        $link=route($user_type.'.posts.disapproved');
        units_func('Disapproved Posts',$count_disapproved_post,$link);

        $count_pending_user=$obj->$pending_user(true);
        $link=route('pending_'.$val);
        units_func('Pending '.ucfirst($val).'s',$count_pending_user,$link);

        $count_update_pending_user=$obj->$update_pending_user(true);
        $link=route('update_pending_'.$val);
        units_func('Updated Pending '.ucfirst($val).'s',$count_update_pending_user,$link);
   
        $count_approved_user=$obj->$approved_user(true);
        $link=route('approved_'.$val);
        units_func('Approved '.ucfirst($val).'s',$count_approved_user,$link);

        $count_disapproved_user=$obj->$disapproved_user(true);
        $link=route('disapproved_'.$val);
        units_func('Disapproved '.ucfirst($val).'s',$count_disapproved_user,$link);
 
        return view($user_type.'.'.$user_type.'_dashboard', ['units'=>$units]);

        }


}