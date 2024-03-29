<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BloggerController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['guest:admin','guest:blogger','disable_back_btn'])->group(function () {


Route::get('/', [HomeController::class, 'home'])
                ->name('home');

Route::get('/register-admin', [AdminController::class, 'create'])
                ->name('register-admin');

Route::post('/register-admin', [AdminController::class, 'store']);

Route::get('/login-admin', [AdminController::class, 'login_admin_form'])
                ->name('login-admin');

Route::post('/login-admin', [AdminController::class, 'login_admin']);


Route::get('/register-blogger', [BloggerController::class, 'create'])
                ->name('register-blogger');

Route::post('/register-blogger', [BloggerController::class, 'store']);

Route::get('/login-blogger', [BloggerController::class, 'login_blogger_form'])
                ->name('login-blogger');

Route::post('/login-blogger', [BloggerController::class, 'login_blogger']);


//Password Reset for Admin
Route::get('admin/forgot_password',[AdminController::class, 'forgot_password'])
->name('admin-password-request');

Route::post('admin/forgot_password',[AdminController::class, 'forgot_password_handle'])
->name('admin-password-email');

Route::get('admin/reset_password/{token}/{email}',[AdminController::class, 'reset_password'])
->name('admin-password-reset');

Route::post('admin/reset_password_handle', [AdminController::class, 'reset_password_handle'])
->name('admin-password-update');

//Password Reset for Blogger
Route::get('blogger/forgot_password',[BloggerController::class, 'forgot_password'])
->name('blogger-password-request');

Route::post('blogger/forgot_password',[BloggerController::class, 'forgot_password_handle'])
->name('blogger-password-email');

Route::get('blogger/reset_password/{token}/{email}',[BloggerController::class, 'reset_password'])
->name('blogger-password-reset');

Route::post('blogger/reset_password_handle', [BloggerController::class, 'reset_password_handle'])
->name('blogger-password-update');

});


Route::middleware(['auth:admin','disable_back_btn','is_verify_admin_email'])->group(function () {


Route::get('/dashboard-admin', [AdminController::class, 'dashboard_admin'])
                ->name('dashboard-admin');

Route::get('/setting-admin',[AdminController::class, 'admin_setting'])->name('setting-admin');
      
Route::get('/approve_or_disapprove/{post}', [AdminController::class, 'approve_or_disapprove'])
                ->name('approve_or_disapprove');

Route::post('/approve_selected_post', [AdminController::class, 'approve_selected_post'])
                ->name('approve_selected_post');

Route::post('/disapprove_selected_post', [AdminController::class, 'disapprove_selected_post'])
                ->name('disapprove_selected_post');                


Route::prefix('/admin/posts')->group(function () {
    

  Route::get('/pending', [AdminController::class, 'pending_post'])
                ->name('admin.posts.pending');

  Route::get('/update_pending', [AdminController::class, 'update_pending_post'])
                ->name('admin.posts.update_pending');

  Route::get('/approved', [AdminController::class, 'approved_post'])
                ->name('admin.posts.approved');

  Route::get('/disapproved', [AdminController::class, 'disapproved_post'])
                ->name('admin.posts.disapproved');
  
});


Route::get('/approved_blogger', [AdminController::class, 'approved_blogger'])
                ->name('approved_blogger');

Route::get('/disapproved_blogger', [AdminController::class, 'disapproved_blogger'])
                ->name('disapproved_blogger');

Route::get('/pending_blogger', [AdminController::class, 'pending_blogger'])
                ->name('pending_blogger');

Route::get('/update_pending_blogger', [AdminController::class, 'update_pending_blogger'])
                ->name('update_pending_blogger');


});

//Custom admin email verification 
Route::middleware(['auth:admin','disable_back_btn'])->group(function () {

  
Route::get('admin/account/verify/{token}', [AdminController::class, 'verify_account'])->name('admin-verify');

Route::get('admin/account/email/verification/notice', [AdminController::class, 'verify_account_notice'])->name('admin-verify-notice');

Route::post('admin/account/email/resend', [AdminController::class, 'verify_account_email_resend'])->name('admin-verify-email-resend');


});



Route::middleware(['auth:blogger','disable_back_btn','is_verify_blogger_email'])->group(function () {


Route::get('/dashboard-blogger', [BloggerController::class, 'dashboard_blogger'])
                ->name('dashboard-blogger');
                
Route::get('/setting-blogger',[BloggerController::class, 'blogger_setting'])->name('setting-blogger');

Route::prefix('/posts')->group(function () {


Route::get('/create', [BloggerController::class, 'create_post'])
                ->name('posts.create');

Route::post('/create', [BloggerController::class, 'store_post']);


Route::get('/{post}', [BloggerController::class, 'edit_post'])
                ->name('posts.edit');

Route::put('/{post}', [BloggerController::class, 'update_post']);


});


Route::prefix('/blogger/posts')->group(function () {
    

  Route::get('/pending', [BloggerController::class, 'pending_post'])
                ->name('blogger.posts.pending');

  Route::get('/update_pending', [BloggerController::class, 'update_pending_post'])
                ->name('blogger.posts.update_pending');

  Route::get('/approved', [BloggerController::class, 'approved_post'])
                ->name('blogger.posts.approved');

  Route::get('/disapproved', [BloggerController::class, 'disapproved_post'])
                ->name('blogger.posts.disapproved');
  

});


Route::get('/approved_admin', [BloggerController::class, 'approved_admin'])
                ->name('approved_admin');

Route::get('/disapproved_admin', [BloggerController::class, 'disapproved_admin'])
                ->name('disapproved_admin');

Route::get('/pending_admin', [BloggerController::class, 'pending_admin'])
                ->name('pending_admin');

Route::get('/update_pending_admin', [BloggerController::class, 'update_pending_admin'])
                ->name('update_pending_admin');


});


Route::middleware(['auth:blogger','disable_back_btn'])->group(function () {


Route::get('blogger/account/verify/{token}', [BloggerController::class, 'verify_account'])->name('blogger-verify');

Route::get('blogger/account/email/verification/notice', [BloggerController::class, 'verify_account_notice'])->name('blogger-verify-notice');

Route::post('blogger/account/email/resend', [BloggerController::class, 'verify_account_email_resend'])->name('blogger-verify-email-resend');


});


Route::middleware('operations_for_admin_and_blogger')->group(function () {

Route::post('/logout', [LogoutController::class, 'destroy'])
                ->name('logout');

Route::get('/posts/delete/{post}', [DeleteController::class, 'delete_post'])
                ->name('posts.delete');

Route::post('/posts/delete_selected_post', [DeleteController::class, 'delete_selected_post'])
                ->name('posts.delete_selected_post');

});

                
Route::fallback(function () {
  return redirect()->route('home');
});