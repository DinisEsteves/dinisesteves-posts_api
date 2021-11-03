<?php

use App\Http\Controllers\API\AuthControllerAPI;
use App\Http\Controllers\API\PostsControllerAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


/*
|--------------------------------------------------------------------------
| Auth endpoints
|--------------------------------------------------------------------------
*/

Route::name('auth.')->prefix('auth')->group(function () {
    Route::post('/signin', [AuthControllerAPI::class, 'index'])->name('signin');
    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::get('signout',  [AuthControllerAPI::class, 'destroy'])->name('signout');
    });
});


Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::name('posts.')->prefix('posts')->group(function () {
        Route::get('/', [PostsControllerAPI::class, 'index'])->name('inex');
    });
});