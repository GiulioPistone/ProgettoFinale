<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StarApiController;
use App\Http\Controllers\TrainerApiController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

;
Route::resource('trainers',App\Http\Controllers\TrainerApiController::class );

Route::get('/trainers/{id}', [TrainerController::class, 'show']);

Route::get('/profile', function () {
    return view('profile');
});
Route::get('/livesearch', [TrainerApiController::class, 'getTrainers']);

// Route::get('/profile',[App\Http\Controllers\PostController::class, 'profile'])->name('profile')->middleware('auth');