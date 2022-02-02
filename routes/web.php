<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SesionController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\AdminController;		
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post}',[PostController::class, 'show']);

Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('register',[RegisterController::class, 'create'])->middleware('guest');
Route::post('register',[RegisterController::class, 'store'])->middleware('guest');


Route::get('login', [SesionController::class, 'create'])->middleware('guest');
Route::post('login', [SesionController::class, 'store'])->middleware('guest');

Route::post('logout', [RegisterController::class, 'destroy'])->middleware('auth');

Route::get('admins/post/create', [AdminController::class, 'create'])->middleware('admin');

Route::post('admin/posts', [AdminController::class, 'store'])->middleware('admin');

Route::get('admin/posts', [AdminController::class, 'index'])->middleware('admin');
Route::get('admin/posts/{id}/edit', [AdminController::class, 'edit'])->middleware('admin');
Route::patch('admin/posts/{id}', [AdminController::class, 'update'])->middleware('admin');
Route::delete('admin/posts/{id}', [AdminController::class, 'delete'])->middleware('admin');


        

