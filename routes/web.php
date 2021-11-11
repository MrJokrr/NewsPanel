<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomePostController;

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

Route::resource('/poster/{post}', HomePostController::class)->name('index', 'poster');


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['role:admin'])->prefix('admin_panel') -> group(function (){
   Route::get('/', [App\Http\Controllers\HomeAdminController::class, 'index'])->name('homeAdmin');
   Route::resource('post', PostController::class);
   Route::resource('create', PostController::class);
   Route::resource('edit', PostController::class);
});




