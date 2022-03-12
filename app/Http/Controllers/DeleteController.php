<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Blogger;
use App\Models\Admin;
use App\Models\Post;

class DeleteController extends Controller
{
      
  public function delete_post(Post $post)
    {
      
        $admin=Auth::guard('admin')->user();

        $blogger=Auth::guard('blogger')->user();

        if($admin && $admin->getTable()=='admins'){

          if($admin->cannot('delete_by_admin', $post)) {
            abort(403);
          }

        }
        elseif($blogger && $blogger->getTable()=='bloggers'){
          if($blogger->cannot('delete_by_blogger', $post)) {
            abort(403);
          }
        }


        $post->delete();

        return redirect()->back()->with('message', 'The post is deleted!!');  
        
    }//end

    public function delete_selected_post(Request $request)
    {


       $post_ids= $request->post_ids;

       $admin_logged_in=Auth::guard('admin')->check();
       

       $blogger_logged_in=Auth::guard('blogger')->check();
       


       foreach ($post_ids as $post_id){
       
        $post=Post::find($post_id);
        
        if($admin_logged_in){

         $admin=Auth::guard('admin')->user();

         if($admin->cannot('delete_by_admin', $post)) {
            abort(403);
          }
      
       }
       elseif($blogger_logged_in){

          $blogger=Auth::guard('blogger')->user();

        if($blogger->cannot('delete_by_blogger', $post)) {
            abort(403);
          }
       
       }

       }

      if(is_array($post_ids) && count($post_ids)>0){
        
        Post::destroy($post_ids);
        return redirect()->back()->with('message', 'The Selected Posts are Deleted!!');
    
     }
     else
     {
        return redirect()->back()->with('message', 'Please Select the Posts to Delete!!');
     }
       
    }//end
}
