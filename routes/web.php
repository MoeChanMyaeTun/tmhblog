<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CategoryPostController;

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


Auth::routes();

Route::get('logout', [LoginController::class, 'logout']);
// Route::get('/', [HomeController::class, 'index'])->name('home');

//post
Route::get('/',[PostController::class,'index'])->name('post.index');
Route::get('/post/create',[PostController::class,'create'])->name('post.create');
Route::post('/post/create',[PostController::class,'store'])->name('post.store');
Route::get('/post/show/{id}',[PostController::class, 'show'])->name('post.show');
Route::get('/post/edit/{id}',[PostController::class, 'edit'])->name('post.edit');
Route::post('/post/update/{id}',[PostController::class, 'update'])->name('post.update');
Route::delete('/post/delete/{id}',[PostController::class, 'delete'])->name('post.delete');
//category_post

Route::get('category/{id}',[CategoryPostController::class,'show'])->name('category.show');

//admin
Route::group([ 'prefix' => 'admin', 'as' => 'admin.'], function () {
Route::get('category',[CategoriesController::class,'index'])->name('category.index');
Route::get('category/create',[CategoriesController::class,'create'])->name('category.create');
Route::post('category/create',[CategoriesController::class,'store'])->name('category.store');

Route::get('/post',[PostsController::class,'index'])->name('post.index');
Route::get('/post/edit/{id}',[PostsController::class, 'edit'])->name('post.edit');
Route::put('/post/update/{id}',[PostsController::class, 'update'])->name('post.update');
Route::delete('/post/delete/{id}',[PostsController::class, 'delete'])->name('post.delete');
});
