<?php

use Doctrine\DBAL\Schema\Index;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

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

Route::get('/', [PostController::class, 'index'])->name('main');


Route::group(['middleware' => 'prevent-back-history'], function () {
    Auth::routes();
    Route::get('/home', [PostController::class, 'index'])->name('home');


    /**
     * Web Routes for User
     */
    Route::get('/user_list', [UserController::class, 'getUserList'])->middleware('auth')->name('user_list');

    Route::get('/edit_password', function () {
        return view('users.edit_password');
    })->middleware('auth')->name('change_password');

    Route::get('/edit_user', function () {
        return view('users.edit');
    })->middleware('auth')->name('edit_user');

    Route::get('/register', function () {
        return view('users.create');
    })->name('register');

    Route::get('/confirm_register', function () {
        return view('users.confirm');
    })->name('confirm_register');

    /**
     * Web Routes for Post
     */
    Route::get('/post_list', [PostController::class, 'index'])->middleware('auth')->name('post_list');

    Route::post('/save_post', [PostController::class, 'savePost'])->middleware('auth')->name('save_post');

    Route::get('/create_post', function () {
        return view('posts.create');
    })->middleware('auth')->name('create_post');

    Route::get('/edit_post/{id}', [PostController::class, 'getPostById'])->middleware('auth')->name('edit_post');

    Route::put('/update_post/{id}', [PostController::class, 'updatePost'])->middleware('auth')->name('update_post');

    Route::get('/confirm_post', function () {
        return view('posts.confirm');
    })->middleware('auth')->name('confirm_post');

    Route::get('/upload_post', function () {
        return view('posts.upload');
    })->middleware('auth')->name('upload_post');

    /**
     * Web Routes for Profile
     */
    Route::get('/profile', function () {
        return view('profiles.profile');
    })->middleware('auth')->name('profile');

    Route::get('/profile_edit', function () {
        return view('profiles.edit');
    })->middleware('auth')->name('profile_edit');
});
