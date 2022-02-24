<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BloggerController;
use App\Http\Controllers\LogoutController;
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
      
// Route::get('/approve_or_disprove/{post}', [AdminController::class, 'approve_or_disprove'])
//                 ->name('approve_or_disprove');
 });



Route::middleware(['auth:blogger','disable_back_btn'])->group(function () {


Route::get('/dashboard-blogger', [BloggerController::class, 'dashboard_blogger'])
                ->name('dashboard-blogger');

Route::view('/setting-blogger','blogger.blogger_setting')->name('setting-blogger');


// Route::get('/posts/create', [BloggerController::class, 'create_post'])
//                 ->name('posts.create');

// Route::post('/posts/create', [BloggerController::class, 'store_post']);


// Route::get('/posts/{post}', [BloggerController::class, 'edit_post'])
//                 ->name('posts.edit');

// Route::put('/posts/{post}', [BloggerController::class, 'update_post']);

 });



Route::post('/logout', [LogoutController::class, 'destroy'])
                ->name('logout');

// Route::get('/posts/delete/{post}', [DeleteController::class, 'delete_post'])
//                 ->name('posts.delete');
 
                
Route::fallback(function () {
  return redirect()->route('home');
});