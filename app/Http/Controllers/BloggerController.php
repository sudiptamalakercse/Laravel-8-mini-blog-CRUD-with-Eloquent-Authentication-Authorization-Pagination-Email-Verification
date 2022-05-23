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
use Str;
use App\Models\BloggerVerify;
use Illuminate\Support\Facades\Mail;
use App\Mail\BloggerEmailVerification;
use App\Models\PasswordReset;
use App\Mail\BloggerPasswordReset;


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

       $blogger=Blogger::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        //email verify related code
        $last_id=$blogger->id;
        $token=$last_id.hash('sha256',Str::random(120));


         BloggerVerify::create([
              'blogger_id' => $last_id, 
              'token' => Hash::make($token)
            ]);
        
        //datas which will go with email
        $email_activation_link=route('blogger-verify', $token);
        $email_receiver_name=$blogger->name;
        $user_type='Blogger';

        $email_datas= [
            'email_activation_link'=>$email_activation_link,
            'email_receiver_name'=>$email_receiver_name,
            'user_type'=>$user_type,
        ];
        //end datas which will go with email

        //send email
        Mail::to($blogger->email)->send(new BloggerEmailVerification($email_datas));
        //end send email

         //end email verify related code

        //login
        $credentials=[
        'email' =>$request->email ,
        'password' =>$request->password
        ];

        if (Auth::guard('blogger')->attempt($credentials,false)) {

            $request->session()->regenerate();

            $url=route('dashboard-blogger');

            return redirect()->intended($url)
            ->with('message', 'Your Blogger Account is Registered Successfully & Please Verify Your Email Account!');
        }
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
         $this->authorize('view_any_for_blogger',Post::class);
         return view('blogger.create_post');
    }//end

    public function store_post(Request $request)
    {
         $this->authorize('create_post_by_blogger',Post::class);

         $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string', 'max:255']
        ]);
         
        $admin_count_ = Admin::count();

        if($admin_count_===0){
         return redirect()->back()->with('message', 'First Create Minimum One Admin to Create A Post!!');
        }

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
        $this->authorize('update_by_blogger', $post);

       return view('blogger.edit_post',['post' =>$post]);
    }//end

    
    public function update_post(Request $request, Post $post)
    {

      $this->authorize('update_by_blogger', $post);

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
               ->paginate(10); 

        foreach ($posts as $post) {
           $this->authorize('posts_show_for_blogger',$post);
        }
     
        if($count==true)
        {
            return $posts->total();
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
               ->paginate(10);

        foreach ($posts as $post) {
           $this->authorize('posts_show_for_blogger',$post);
        }

        if($count==true)
        {
            return  $posts->total();
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
               ->paginate(10);

        foreach ($posts as $post) {
           $this->authorize('posts_show_for_blogger',$post);
        }

        if($count==true)
        {
            return  $posts->total();
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
               ->paginate(10);

        foreach ($posts as $post) {
           $this->authorize('posts_show_for_blogger',$post);
        }

        if($count==true)
        {
            return  $posts->total();
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

    public function blogger_setting(){
       
    $this->authorize('view_any_for_blogger',Post::class);
    return view('blogger.blogger_setting');
    }//end

     public function verify_account($token){
                 
        $matched=false;

        $verify_bloggers = BloggerVerify::get();

        foreach ($verify_bloggers as $verify_blogger) {
             if(Hash::check($token,$verify_blogger->token)){
                $matched=true;
                break;
            }
        }
  
        $message = 'Sorry Your Email Verification Link is Old or Incorrect. Please Try With New Email Verification Link!';
    
        if($matched==true){
            
            $blogger = $verify_blogger->blogger;
              
            if(!$blogger->is_email_verified) {

                //Authorization Check
                if($blogger->id!==auth('blogger')->user()->id){
                     abort(403);
                }
                //End Authorization Check
                
                $blogger->is_email_verified = 1;
                $blogger->save();
                $message = "Your e-mail is verified.";
            } else {
                $message = "Your e-mail is already verified.";
            }
        }

     if(auth('blogger')->user()!== null){
      return redirect()->route('dashboard-blogger')->with('message', $message);
     }
     else{
      return redirect()->route('login-blogger')->with('message', $message);
     }
    }//end

    public function verify_account_notice(){
    
    if(auth('blogger')->user()->is_email_verified==0){

      return view('blogger.email.verify_account_notice');

    }
    else{
      return redirect()->route('dashboard-blogger');
    }

    }//end

     public function verify_account_email_resend(Request $request){
        $blogger=$request->user('blogger');
        $blogger_verify=$blogger->BloggerVerify;
        $blogger_verify->delete();

        $blogger_id=$blogger->id;
        $token=$blogger_id.hash('sha256',Str::random(120));


        BloggerVerify::create([
              'blogger_id' => $blogger_id, 
              'token' => Hash::make($token)
            ]);

      //datas which will go with email
        $email_activation_link=route('blogger-verify', $token);
        $email_receiver_name=$blogger->name;
        $user_type='Blogger';

        $email_datas= [
            'email_activation_link'=>$email_activation_link,
            'email_receiver_name'=>$email_receiver_name,
            'user_type'=>$user_type,
        ];
        //end datas which will go with email

        //send email
        Mail::to($blogger->email)->send(new BloggerEmailVerification($email_datas));
        //end send email

         //end email verify related code
        return redirect()->back()
            ->with('message', 'Verification Email Sent & Please Verify Your Email Account!');
    }

    
public function forgot_password () {
    return view('blogger.forgot_password');
}//end

public function forgot_password_handle(Request $request) {
    $request->validate(['email' => 'required|email']);
    $email=$request->email;
    $blogger=Blogger::where('email',$email)->first();
    $mess='';
    if($blogger!=null){
    
    $password_reset=PasswordReset::latest()->first();
    
    if($password_reset==null){
     $password_reset_last_id=1; 
    }
    else{
     $password_reset_last_id=$password_reset->id+1;
    }
   
    $token=$password_reset_last_id.hash('sha256',Str::random(120));
   
    PasswordReset::create([
              'email' => $email, 
              'token' => Hash::make($token),
              'user_type' =>'Blogger'
            ]);
       
        //datas which will go with email
        $blogger_password_reset_link=route('blogger-password-reset',['token'=>$token,'email'=>$email]);
    
        $password_resetter_name=$blogger->name;
        $user_type='Blogger';

        $email_datas= [
            'blogger_password_reset_link'=>$blogger_password_reset_link,
            'password_resetter_name'=>$password_resetter_name,
            'user_type'=>$user_type,
        ];
        //end datas which will go with email

        //send email
        Mail::to($email)->send(new BloggerPasswordReset($email_datas));
        //end send email

         //end email verify related code

       $mess='We Sent You A Password Reset Link to Your Email!';
    }
    else{
       $mess='We Do Not Find This Email!';
    }

    return redirect()->back()->with('message', $mess)->withInput(); 
}//end

public function reset_password($token,$email) {
    return view('blogger.reset_password', ['token' => $token,'email' =>$email]);
}

public function reset_password_handle(Request $request) {
$request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);
    
    $email=$request->email;
    $password=$request->password;
    $token=$request->token;

    $mess='';
    $token_matched=false;
    $PasswordReset_id=null;
    $all_ok=false;

    $PasswordResets=PasswordReset::get(); 

    foreach ($PasswordResets as $PasswordReset) {
             if(Hash::check($token,$PasswordReset->token)){
                $token_matched=true;
                $PasswordReset_id=$PasswordReset->id;
                break;
            }
        }

    if($token_matched==true){
      $PasswordReset=PasswordReset::find($PasswordReset_id);        
      if($PasswordReset->email==$email){
         if($PasswordReset->user_type=='Blogger'){
          
          $all_ok=true;

         }else{
           $mess="User Type Is Not Matched!";
         }

      }
      else{
         $mess="Email Is Not Matched!"; 
      }
    }
    else{
      $mess="Token Is Not Matched or Old!";
    }

    if($all_ok==true){

      //Update Password
      $blogger=Blogger::where('email',$email)->first();
      $blogger->password = Hash::make($password);
      $blogger->save();

      //delete reset_password_table record
      PasswordReset::where('email',$email)
                     ->where('user_type','Blogger')
                     ->delete();

       //login
        $credentials=[
        'email' =>$email ,
        'password' =>$password
        ];

        if (Auth::guard('blogger')->attempt($credentials,false)) {

            $request->session()->regenerate();

            $url=route('dashboard-blogger');

            $request->session()->put('message_password_reset', 'Your Password Is Successfully Changed!');
            
            return redirect()->intended($url);
            
            
        }
    }
    else{
        return redirect()->back()->with('message', $mess);
    }
}//end

}
