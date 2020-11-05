<?php

use Illuminate\Support\Facades\Route;

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
    return view('layouts.app');
});
Route::get('/post_list', function () {
    return view('posts.post_list');
})->name('post_list');
Route::get('/user_list', function () {
    return view('users.user_list');
})->name('user_list');
Route::get('/create_post', function () {
    return view('posts.create');
})->name('create_post');
Route::get('/update_post', function () {
    return view('posts.update');
})->name('update_post');
Route::get('/confirm_post', function () {
    return view('posts.confirm');
});
Route::get('/edit_password', function () {
    return view('users.edit_password');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
