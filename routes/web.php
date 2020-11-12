<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('posts.post_list');
})->name('main');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/**
 * Web Routes for User
 */
Route::get('/user_list', function () {
    return view('users.user_list');
})->middleware('auth')->name('user_list');

Route::get('/edit_password', function () {
    return view('users.edit_password');
})->name('change_password');

Route::get('/register', function () {
    return view('users.create');
})->name('register');

Route::get('/confirm_register', function () {
    return view('users.confirm');
})->name('confirm_register');

Route::get('/edit_user', function () {
    return view('users.edit');
})->middleware('auth')->name('edit_user');

/**
 * Web Routes for Post
 */
Route::get('/post_list', function () {
    return view('posts.post_list');
})->middleware('auth')->name('post_list');

Route::get('/create_post', function () {
    return view('posts.create');
})->middleware('auth')->name('create_post');

Route::get('/update_post', function () {
    return view('posts.update');
})->middleware('auth')->name('update_post');

Route::get('/confirm_post', function () {
    return view('posts.confirm');
});

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

