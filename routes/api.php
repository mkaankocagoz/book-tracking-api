<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\SearchController;
use App\Http\Controllers\Api\UserController;

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

Route::post('/auth/user/login', [LoginController::class, 'index']);
Route::get('/book', [BookController::class, 'index']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/auth//user/register', [RegisterController::class, 'index']);

    Route::post('/book', [BookController::class, 'store']);
    Route::put('/book/{id}', [BookController::class, 'update']);
    Route::delete('/book/{id}', [BookController::class, 'destroy']);

    Route::post('/search', [SearchController::class, 'index']);

    Route::get('/user/read/{id}', [UserController::class, 'read']);
    Route::get('/user/will-read/{id}', [UserController::class, 'will_read']);
});
