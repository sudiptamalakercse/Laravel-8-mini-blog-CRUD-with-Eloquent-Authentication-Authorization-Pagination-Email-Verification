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


class AdminController extends Controller
{
    public function create()
    {
        return view('admin.register');
    }

   public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', Rules\Password::defaults()]
        ]);

       Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->back()->with('message', 'Your Admin Account is Registered Successfully!');  
    }

    public function login_admin_form()
    {
        return view('admin.login');
    }

    public function login_admin(Request $request)
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

        if (Auth::guard('admin')->attempt($credentials,$remember)) {

            $request->session()->regenerate();

            $url=route('dashboard-admin');

            return redirect()->intended($url)
            ->with('message', 'You Are Logged In Successfully as Admin!!');
        }
 
        return back()->withErrors([
            'email' => 'The Provided Credentials Do Not Match With Our Records.',
        ])->withInput();
    }

     public function dashboard_admin()
    {
        return view('admin.admin_dashboard');
    }

    // private function admin_auth(){
    //    return Auth::guard('admin')->user();
    // }//end

    //  public function approve_or_disapprove(Post $post)
    // {
  
    //    if(($post->post_approved==1 || $post->post_approved==0) && $post->update_approved==0 && ($post->post_pending==0 || $post->post_pending==1))
    //    {
    //      $post->post_approved =1;
    //      $post->update_approved =1;
    //      $post->post_pending =0;
    //      $m='approved';
    //    }
    //    elseif(($post->post_approved==1 || $post->post_approved==0) && ($post->update_approved==1 || $post->update_approved==0) && ($post->post_pending==0 || $post->post_pending==1))
    //    {
    //      $post->post_approved =0;
    //      $post->update_approved =0;
    //      $post->post_pending =0;
    //      $m='disapproved';
    //    }

    //     $post->save();

    //    return redirect()->back()->with('message', 'The post is '.$m.' Successfully!!');

    // }//end
       
    //     public function pending_post()
    //     {

    //     $admin=$this->admin_auth(); 
    //     $admin_id=$admin->id;
        
    //     $posts=Post::
    //              where('admin_id','==',$admin_id)
    //            ->where('post_approved',0)
    //            ->where('update_approved',0)
    //            ->where('post_pending',1)
    //            ->get();

    //     return view('admin.pending_post',['posts'=>$posts]);
    //     }//end


    //    public function update_pending_post()
    //    {

    //     $admin=$this->admin_auth();

    //     $posts=$admin
    //            ->posts()
    //            ->where('post_approved',1)
    //            ->where('update_approved',0)
    //            ->where('post_pending',0)
    //            ->get();

    //     return view('admin.update_pending_post',['posts'=>$posts]);
    //    }//end


    //     public function approved_post()
    //     {

    //     $admin=$this->admin_auth();

    //     $posts=$admin
    //            ->posts()
    //            ->where('post_approved',1)
    //            ->where('update_approved',1)
    //            ->where('post_pending',0)
    //            ->get();

    //     return view('admin.approved_post',['posts'=>$posts]);
    //     }//end


    //     public function disapproved_post()
    //     {

    //     $admin=$this->admin_auth();

    //     $posts=$admin
    //            ->posts()
    //            ->where('post_approved',0)
    //            ->where('update_approved',0)
    //            ->where('post_pending',0)
    //            ->get();

    //     return view('admin.disapproved_post',['posts'=>$posts]);
    //     }//end


    //     public function approved_blogger()
    //     {
            
    //     $admin=$this->admin_auth();

    //     $posts=$admin
    //            ->posts()
    //            ->where('post_approved',1)
    //            ->where('update_approved',1)
    //            ->where('post_pending',0)          
    //            ->distinct()
    //            ->get(['blogger_id']);

    //     return view('admin.approved_blogger',['posts'=>$posts]);

    //     }//end


    //     public function disapproved_blogger()
    //     {

    //     $admin=$this->admin_auth();

    //     $posts=$admin
    //            ->posts()
    //            ->where('post_approved',0)
    //            ->where('update_approved',0)   
    //            ->where('post_pending',0)       
    //            ->distinct()
    //            ->get(['blogger_id']); 

    //     return view('admin.disapproved_blogger',['posts'=>$posts]);

    //     }//end

   


}
