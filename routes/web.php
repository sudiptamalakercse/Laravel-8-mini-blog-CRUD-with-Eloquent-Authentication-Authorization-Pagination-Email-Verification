<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BloggerController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\DeleteController;
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

    
Route::get('/', function () {
    return view('home');
})->name('home');

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


});



Route::middleware(['auth:admin','disable_back_btn'])->group(function () {


Route::get('/dashboard-admin', [AdminController::class, 'dashboard_admin'])
                ->name('dashboard-admin');

Route::view('/setting-admin','admin.admin_setting')->name('setting-admin');
      
Route::get('/approve_or_disapprove/{post}', [AdminController::class, 'approve_or_disapprove'])
                ->name('approve_or_disapprove');

Route::post('/approve_selected_post', [AdminController::class, 'approve_selected_post'])
                ->name('approve_selected_post');

Route::post('/disapprove_selected_post', [AdminController::class, 'disapprove_selected_post'])
                ->name('disapprove_selected_post');                


Route::prefix('/admin/posts')->group(function () {
    

  Route::get('/pending', [AdminController::class, 'pending_post'])
                ->name('admin.posts.pending');

  // Route::get('/update_pending', [AdminController::class, 'update_pending_post'])
  //               ->name('admin.posts.update_pending');

  Route::get('/approved', [AdminController::class, 'approved_post'])
                ->name('admin.posts.approved');

  // Route::get('/disapproved', [AdminController::class, 'disapproved_post'])
  //               ->name('admin.posts.disapproved');
  
});


// Route::get('/approved_blogger', [AdminController::class, 'approved_blogger'])
//                 ->name('approved_blogger');

// Route::get('/disapproved_blogger', [AdminController::class, 'disapproved_blogger'])
//                 ->name('disapproved_blogger');


});



Route::middleware(['auth:blogger','disable_back_btn'])->group(function () {


Route::get('/dashboard-blogger', [BloggerController::class, 'dashboard_blogger'])
                ->name('dashboard-blogger');

Route::view('/setting-blogger','blogger.blogger_setting')->name('setting-blogger');

Route::prefix('/posts')->group(function () {


Route::get('/create', [BloggerController::class, 'create_post'])
                ->name('posts.create');

Route::post('/create', [BloggerController::class, 'store_post']);


Route::get('/{post}', [BloggerController::class, 'edit_post'])
                ->name('posts.edit');

Route::put('/{post}', [BloggerController::class, 'update_post']);


});


// Route::prefix('/blogger/posts')->group(function () {
    

  Route::get('/pending', [BloggerController::class, 'pending_post'])
                ->name('blogger.posts.pending');

//   Route::get('/update_pending', [BloggerController::class, 'update_pending_post'])
//                 ->name('blogger.posts.update_pending');

//   Route::get('/approved', [BloggerController::class, 'approved_post'])
//                 ->name('blogger.posts.approved');

//   Route::get('/disapproved', [BloggerController::class, 'disapproved_post'])
//                 ->name('blogger.posts.disapproved');
  

// });


// Route::get('/approved_admin', [BloggerController::class, 'approved_admin'])
//                 ->name('approved_admin');

// Route::get('/disapproved_admin', [BloggerController::class, 'disapproved_admin'])
//                 ->name('disapproved_admin');


});




Route::post('/logout', [LogoutController::class, 'destroy'])
                ->name('logout');

Route::get('/posts/delete/{post}', [DeleteController::class, 'delete_post'])
                ->name('posts.delete');

Route::post('/posts/delete_selected_post', [DeleteController::class, 'delete_selected_post'])
                ->name('posts.delete_selected_post');
 
                
Route::fallback(function () {
  return redirect()->route('home');
});