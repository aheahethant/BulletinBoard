<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PostAPIController;
use App\Http\Controllers\API\UserAPIController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function () {
    return response()->json(['data' => 'test']);
});

/**
 * Route for User
 */
Route::get('/user/list', [UserAPIController::class, 'index']);

Route::post('/create/user', [UserAPIController::class, 'createUser']);

Route::post('/update/user/{id}', [UserAPIController::class, 'updateUser']);

Route::post('/login', [UserAPIController::class, 'login']);

Route::delete('/delete/user/{id}', [UserAPIController::class, 'destroy']);

Route::post('/logout', [UserAPIController::class, 'logout']);

Route::post('/change/password/{id}', [UserAPIController::class, 'changePassword']);

/**
 * Route for Post
 */
Route::get('/post/list', [PostAPIController::class, 'index']);

Route::post('/create/post', [PostAPIController::class, 'savePost']);

Route::get('/post/detail/{id}', [PostAPIController::class, 'postDetail']);

Route::put('/edit/post/{id}', [PostAPIController::class, 'editPost']);

Route::delete('/delete/post/{id}', [PostAPIController::class, 'destroy']);
