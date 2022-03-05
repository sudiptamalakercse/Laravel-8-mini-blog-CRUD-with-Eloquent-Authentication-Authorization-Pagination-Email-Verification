<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\Blogger;
use App\Models\Admin;
use App\Models\Post;
use App\CustomClass\User;


class BloggerController extends Controller
{
    public function create()
    {
        return view('blogger.register');
    }

   public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:bloggers'],
            'password' => ['required', Rules\Password::defaults()]
        ]);

       Blogger::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->back()->with('message', 'Your Blogger Account is Registered Successfully!');  
    }

    public function login_blogger_form()
    {
        return view('blogger.login');
    }

    public function login_blogger(Request $request)
    {
        $remember=$request->remember;
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if($remember===null)
        {
           $remember=false; 
        }
        else
        {
          $remember=true; 
        }

        if (Auth::guard('blogger')->attempt($credentials,$remember)) {

            $request->session()->regenerate();

            $url=route('dashboard-blogger');

            return redirect()->intended($url)
            ->with('message', 'You Are Logged In Successfully as Blogger!!');
        }
 
        return back()->withErrors([
            'email' => 'The Provided Credentials Do Not Match With Our Records.',
        ])->withInput();
    }

     public function dashboard_blogger()
    {
        $view= User::dashboard('blogger');
        
        return $view;
    }

    private function get_assigned_task_admin_id(){

        $admin_id=null;

        $admin_count = Admin::count();

        $task_assigned_admin_count = Admin::where('task_assigned',1)->count();

        if( $task_assigned_admin_count<$admin_count){
          
           $admin = Admin::where('task_assigned',0)
                           ->first();

           $admin->task_assigned = 1;

           $admin->save();

           $admin_id = $admin->id;

        }
        elseif($task_assigned_admin_count==$admin_count){

          
           Admin::where('task_assigned',1)
                  ->update(['task_assigned' => 0]);

           $admin = Admin::where('task_assigned',0)
                           ->first();

           $admin->task_assigned = 1;

           $admin->save();

           $admin_id = $admin->id;
        }
           
           return $admin_id;

    }//end

    public function create_post()
    {
         return view('blogger.create_post');
    }//end

    public function store_post(Request $request)
    {
         $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string', 'max:255']
        ]);
         
        $admin_id=$this->get_assigned_task_admin_id();

        if($admin_id==null){
          return redirect()->back()->with('message', 'Not possible to create post because there is no admin to approve any post in this app!!');
        }
 
        $blogger=Auth::guard('blogger')->user();
 
        $blogger->posts()->create([
        'title' => $request->title,
         'body' => $request->body,
         'admin_id' => $admin_id
     ]);

     return redirect()->route('blogger.posts.pending')->with('message', 'Your post is forwarded to Admin for Approval!!');  
    }//end


    public function edit_post(Post $post)
    {
       return view('blogger.edit_post',['post' =>$post]);
    }//end

    
    public function update_post(Request $request, Post $post)
    {
            $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string', 'max:255']
        ]);

        $post->title = $request->title;
        $post->body = $request->body;
        if($post->post_pending ==0)
        {
            $post->post_approved = 1;
            $post->update_approved = 0;
        }
        elseif($post->post_pending ==1)
        {
            $post->post_approved = 0;
            $post->update_approved = 0;
        }
        $post->save();
        if($post->post_pending ==0)
        {
          return redirect()->route('blogger.posts.update_pending')->with('message', 'Your updated post is forwarded to Admin for Approval!!');
        }
        elseif($post->post_pending ==1)
        {
          return redirect()->route('blogger.posts.pending')->with('message', 'Your updated post is forwarded to Admin for Approval!!');
        }

    }//end


    private function blogger_auth(){
       return Auth::guard('blogger')->user();
    }//end
        

    public function pending_post($count=false)
    {
        $blogger=$this->blogger_auth();

        $posts=$blogger
               ->posts()
               ->where('post_approved',0)
               ->where('update_approved',0)
               ->where('post_pending',1)
               ->orderBy('updated_at', 'desc')
               ->get();

        if($count==true)
        {
            return  count($posts);
        }

        return view('blogger.pending_post',['posts'=>$posts]);
    }//end


    public function update_pending_post($count=false)
    {
        $blogger=$this->blogger_auth();

        $posts=$blogger
               ->posts()
               ->where('post_approved',1)
               ->where('update_approved',0)
               ->where('post_pending',0)
               ->orderBy('updated_at', 'desc')
               ->get();

        if($count==true)
        {
            return  count($posts);
        }

        return view('blogger.update_pending_post',['posts'=>$posts]);
    }//end


    public function approved_post($count=false)
    {
        $blogger=$this->blogger_auth();

        $posts=$blogger
               ->posts()
               ->where('post_approved',1)
               ->where('update_approved',1)
               ->where('post_pending',0)
               ->orderBy('updated_at', 'desc')
               ->get();

        if($count==true)
        {
            return  count($posts);
        }

        return view('blogger.approved_post',['posts'=>$posts]);
    }//end


    public function disapproved_post($count=false)
    {
        $blogger=$this->blogger_auth();

        $posts=$blogger
               ->posts()
               ->where('post_approved',0)
               ->where('update_approved',0)
               ->where('post_pending',0)
               ->orderBy('updated_at', 'desc')
               ->get();

        if($count==true)
        {
            return  count($posts);
        }

        return view('blogger.disapproved_post',['posts'=>$posts]);
    }//end


    public function approved_admin($count=false)
    {
      return User::pending_updatePending_approved_disapproved_user_list('blogger',1,1,0,$count);
    }//end


    public function disapproved_admin($count=false)
    {
      return User::pending_updatePending_approved_disapproved_user_list('blogger',0,0,0,$count);
    }//end

    public function pending_admin($count=false)
    {
      return User::pending_updatePending_approved_disapproved_user_list('blogger',0,0,1,$count);
    }//end

    public function update_pending_admin($count=false)
    {
      return User::pending_updatePending_approved_disapproved_user_list('blogger',1,0,0,$count);
    }//end


}
