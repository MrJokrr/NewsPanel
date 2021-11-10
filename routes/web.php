<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ViewController;

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

Route::resource('/', HomeController::class);
Route::get('/post', [ViewController::class, 'index'])->name('vp');
Route::get('/viewpost', [HomeController::class, 'postView'])->name('viewPosts');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['role:admin'])->prefix('admin_panel') -> group(function (){
   Route::get('/', [App\Http\Controllers\HomeAdminController::class, 'index'])->name('homeAdmin');
   Route::resource('post', PostController::class);
   Route::resource('create', PostController::class);
   Route::resource('edit', PostController::class);
});




