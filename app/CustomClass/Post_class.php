<?php
namespace App\CustomClass;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class Post_class
{
   public static function show_home()
   {
        $posts=Post::
                 where('post_approved',1)
               ->where('update_approved',1)
               ->where('post_pending',0)
               ->orderBy('updated_at', 'desc')
               ->get();   
      // dd($posts);
        return view('home',['posts'=>$posts]);
   }
}