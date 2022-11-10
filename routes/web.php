<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/',[App\Http\Controllers\Frontend\FrontendController::class, 'index']);
Route::get('tutorial/{category_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'viewCategoryPost']);
Route::match(['get', 'post'],'/tutorial/{category_slug}/{post_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'viewPost']);

//Comment System
Route::post('comments', [App\Http\Controllers\Frontend\CommentController::class, 'store']);


Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function (){

    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::get('category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
    Route::get('add-category', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
    Route::post('add-category', [App\Http\Controllers\Admin\CategoryController::class, 'store']);
    Route::get('edit-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
    Route::put('update-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);
    Route::get('delete-category/{category_id}',  [App\Http\Controllers\Admin\CategoryController::class, 'destroy']);
    Route::post('delete-category',  [App\Http\Controllers\Admin\CategoryController::class, 'destroy']);

    Route::get('posts', [App\Http\Controllers\Admin\PostController::class, 'index']);
    Route::get('add-post', [App\Http\Controllers\Admin\PostController::class, 'create']);
    Route::post('add-post', [App\Http\Controllers\Admin\PostController::class, 'store']);
    Route::get('post/{post_id}', [App\Http\Controllers\Admin\PostController::class, 'edit']);
    Route::put('update-post/{post_id}', [App\Http\Controllers\Admin\PostController::class, 'update']);
    Route::get('delete-post/{post_id}', [App\Http\Controllers\Admin\PostController::class, 'destroy']);

    Route::get('users', [App\Http\Controllers\Admin\UserController::class, 'index']);
    Route::get('user/{user_id}',[App\Http\Controllers\Admin\UserController::class, 'edit']);
    Route::put('update-user/{user_id}',[App\Http\Controllers\Admin\UserController::class, 'update']);

    Route::get('questions', [App\Http\Controllers\Admin\QuestionController::class, 'index']);
    Route::get('question/{question_id}', [App\Http\Controllers\Admin\QuestionController::class, 'edit']);
    Route::put('update-question/{question_id}', [App\Http\Controllers\Admin\QuestionController::class, 'update']);
});

Route::prefix('user')->middleware(['auth', 'isUser'])->group(function (){
    Route::get('questions', [App\Http\Controllers\User\QuestionController::class, 'index']);
    Route::get('add-post', [App\Http\Controllers\User\QuestionController::class, 'create']);
    Route::post('add-post', [App\Http\Controllers\User\QuestionController::class, 'store']);
    Route::get('post/{question_id}', [App\Http\Controllers\User\QuestionController::class, 'edit']);
    Route::put('update-post/{question_id}', [App\Http\Controllers\User\QuestionController::class, 'update']);
    Route::get('delete-post/{question_id}', [App\Http\Controllers\User\QuestionController::class, 'destroy']);

    Route::get('admin/category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
    Route::get('admin/add-category', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
    Route::post('admin/add-category', [App\Http\Controllers\Admin\CategoryController::class, 'store']);
    Route::get('admin/edit-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
    Route::put('admin/update-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);
    Route::get('admin/delete-category/{category_id}',  [App\Http\Controllers\Admin\CategoryController::class, 'destroy']);
    Route::post('admin/delete-category',  [App\Http\Controllers\Admin\CategoryController::class, 'destroy']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
