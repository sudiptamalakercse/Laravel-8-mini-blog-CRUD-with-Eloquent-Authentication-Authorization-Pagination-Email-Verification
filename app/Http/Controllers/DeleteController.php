<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogger;
use App\Models\Admin;
use App\Models\Post;

class DeleteController extends Controller
{


    // public function __construct()
    // {
    //     $this->middleware(['guest:admin','guest:blogger'])->except(['delete_post','delete_selected_post']);
    // }//end
      
    // public function delete_post(Post $post)
    // {
    //     $post->delete();

    //     return redirect()->back()->with('message', 'The post is deleted!!');  
        
    // }//end

    // public function delete_selected_post(Request $request)
    // {
    //    $post_ids= $request->post_ids;
       
    //    Post::destroy($post_ids);
    // }
}
