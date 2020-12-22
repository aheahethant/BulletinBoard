<?php

use Doctrine\DBAL\Schema\Index;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\CheckAge;
use App\Models\User;
use Whoops\Run;

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

Route::get('/', 'PostController@index')->name('main');

Route::post('/confirm_register', 'UserController@createUser')->name('confirm_register');

Route::post('/save_user', 'UserController@saveUser')->name('save_user');


Route::group(['middleware' => 'prevent-back-history'], function () {
    Auth::routes();
    Route::get('/home', 'PostController@index')->name('home');

    /**
     * Web Routes for User
     */
    Route::get('/user_list', 'UserController@getUserList')->middleware('auth')->name('user_list');

    Route::get('/edit_password', function () {
        return view('users.edit_password');
    })->middleware('auth')->name('edit_password');

    Route::put('/change_password', 'UserController@changePassword')->middleware('auth')->name('change_password');

    Route::delete('/delete_user', 'UserController@deleteUserById')->middleware('auth')->middleware(CheckAge::class)->name('delete_user');

    Route::get('/edit_user/{id}', 'UserController@editUser')->middleware('auth')->middleware(CheckAge::class)->name('edit_user');

    Route::put('/update_user/{id}', 'UserController@updateUser')->middleware('auth')->middleware(CheckAge::class)->name('update_user');

    Route::put('/edit_profile/{id}', 'UserController@editProfile')->middleware('auth')->name('edit_profile');

    Route::get('/register', function () {
        return view('users.create');
    })->name('register');

    /**
     * Web Routes for Post
     */
    Route::get('/post_list', 'PostController@index')->middleware('auth')->name('post_list');

    Route::post('/save_post', 'PostController@savePost')->middleware('auth')->name('save_post');

    Route::get('/create_post', function () {
        return view('posts.create');
    })->middleware('auth')->name('create_post');

    Route::get('/edit_post/{id}', 'PostController@getPostById')->middleware('auth')->name('edit_post');

    Route::put('/update_post/{id}', 'PostController@updatePost')->middleware('auth')->name('update_post');

    Route::delete('/delete_post', 'PostController@deletePostById')->middleware('auth')->name('delete_post');

    Route::get('/confirm_post', function () {
        return view('posts.confirm');
    })->middleware('auth')->name('confirm_post');

    Route::get('/upload_post', function () {
        return view('posts.upload');
    })->middleware('auth')->name('upload_post');

    Route::post('import_csv_file', 'PostController@importFile')->middleware('auth')->name('import_csv_file');

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
