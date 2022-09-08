<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RatingApiController;
use App\Http\Controllers\CommentApiController;
use App\Http\Controllers\TrainerApiController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('trainers',TrainerApiController::class);
Route::resource('ratings',RatingApiController::class);
Route::resource('comments',CommentApiController::class);
Route::get('/trainers/{id}', [TrainerApiController::class, 'show']);
Route::apiResource('posts', App\Http\Controllers\PostController::class);
Route::get('/profile',[App\Http\Controllers\PostController::class, 'profile'])->name('profile')->middleware('auth');