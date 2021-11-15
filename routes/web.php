<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('show/{post}', [HomeController::class, 'show'])->name('show');

//Route::resource('/{post}', HomeController::class)->name('index', 'poster');
//Route::resource('/', HomeController::class)->name('/', 'show');
Route::redirect('/logout', '/');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout');

Route::middleware(['role:admin'])->prefix('admin_panel') -> group(function (){
   Route::get('/', [App\Http\Controllers\admin\HomeAdminController::class, 'index'])->name('homeAdmin');
   Route::resource('post', PostController::class);
   Route::resource('create', PostController::class);
   Route::resource('edit', PostController::class);
});




