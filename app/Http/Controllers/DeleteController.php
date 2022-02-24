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
    //     $this->middleware(['guest:admin','guest:blogger'])->except('post_destroy');
    // }//end
      
    // public function post_destroy(Post $post)
    // {
    //     $post->delete();

    //     return redirect()->back()->with('message', 'The post is deleted!!');  
        
    // }//end
}
