<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoriesController;

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
Route::get('/home', [PostController::class, 'index'])->name('home');
Route::get('/',[PostController::class,'index'])->name('post.index');
Route::get('/post/create',[PostController::class,'create'])->name('post.create');
Route::post('/post/create',[PostController::class,'store'])->name('post.store');
Route::get('/post/show/{id}',[PostController::class, 'show'])->name('post.show');
Route::get('/post/edit/{id}',[PostController::class, 'edit'])->name('post.edit');
Route::post('/post/update/{id}',[PostController::class, 'update'])->name('post.update');
Route::delete('/post/delete/{id}',[PostController::class, 'delete'])->name('post.delete');

//admin
Route::group([ 'prefix' => 'admin', 'as' => 'admin.'], function () {
Route::get('category',[CategoriesController::class,'index'])->name('category.index');
Route::get('category/create',[CategoriesController::class,'create'])->name('category.create');
Route::post('category/create',[CategoriesController::class,'store'])->name('category.store');

});
