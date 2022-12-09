<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\CategoryController;

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

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//post
Route::get('/', [PostController::class, 'index'])->name('post.index');
Route::get('/post', [PostController::class, 'create'])->name('post.create');
Route::post('/post/create', [PostController::class, 'store'])->name('post.store');
Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');

//category_post
Route::get('category/{id}', [CategoriesController::class, 'show'])->name('category.show');

//admin
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('category/create', [CategoryController::class, 'store'])->name('category.store');

    Route::get('/post', [PostsController::class, 'index'])->name('post.index');
    Route::get('/post/{post}/edit', [PostsController::class, 'edit'])->name('post.edit');
    Route::put('/post/{post}', [PostsController::class, 'update'])->name('post.update');
    Route::delete('/post/{post}', [PostsController::class, 'destroy'])->name('post.delete');
});
