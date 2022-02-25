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
        return view('blogger.blogger_dashboard');
    }

    // public function create_post()
    // {
    //      return view('blogger.create_post');
    // }//end

    // public function store_post(Request $request)
    // {
    //      $request->validate([
    //         'title' => ['required', 'string', 'max:255'],
    //         'body' => ['required', 'string', 'max:255']
    //     ]);

    //     $blogger=$request->guard('blogger')->user();
 
    //     $blogger->posts()->create([
    //     'title' => $request->title,
    //      'body' => $request->body
    //  ]);

    //  return redirect()->back()->with('message', 'Your post is forwarded to Admin for Approval!!');  
    // }//end


    // public function edit_post(Post $post)
    // {
    //    return view('blogger.edit_post',['post' =>$post]);
    // }//end

    
    // public function update_post(Request $request, Post $post)
    // {
    //         $request->validate([
    //         'title' => ['required', 'string', 'max:255'],
    //         'body' => ['required', 'string', 'max:255']
    //     ]);

    //     $post->title = $request->title;
    //     $post->body = $request->body;
    //     $post->update_approved = false;
    //     $post->save();
    //     return redirect()->back()->with('message', 'Your updated post is forwarded to Admin for Approval!!');  
    // }//end

}
