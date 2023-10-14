<?php

use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;

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

Route::get('/login', [LoginController::class, 'index']);
Route::post('/submit-login', [LoginController::class, 'login'])->name('login-form');
Route::get('/logout', [LoginController::class, 'logout']);

Route::post('/submit-register', [RegisterController::class, 'register'])->name('register-form');
Route::get('/register', [RegisterController::class, 'index']);

Route::get('/profile', [ProfileController::class, 'index']);

Route::post('/submit-application', [ApplicationController::class, 'submit']);
Route::post('/delete-application/{id}', [ApplicationController::class, 'delete']);
Route::get('/create-application', [ApplicationController::class, 'indexForm']);
Route::get('/applications', [ApplicationController::class, 'index']);

Route::get('/', [PublicController::class, 'index']);
Route::get('/mechanics', [PublicController::class, 'mechanicsIndex']);