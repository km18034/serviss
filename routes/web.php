<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SparePartsController;
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

/*
Public Routes
 */

Route::get('/', [PublicController::class, 'index']);
Route::get('/mechanics', [PublicController::class, 'mechanicsIndex'])->name('mechanics-index');

Route::get('/login', [LoginController::class, 'index'])->name('login-index');
Route::post('/submit-login', [LoginController::class, 'login'])->name('submit-login');
Route::get('/logout', [LoginController::class, 'logout'])->name('submit-logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register-index');
Route::post('/submit-register', [RegisterController::class, 'register'])->name('submit-register');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile-index');
Route::get('/edit-profile/{id}', [ProfileController::class, 'editIndex'])->name('edit-profile-index');
Route::post('/submit-edit-profile/{id}', [ProfileController::class, 'update'])->name('update-profile');
Route::post('/delete-profile/{id}', [ProfileController::class, 'delete'])->name('delete-profile');

Route::get('/applications', [ApplicationController::class, 'index'])->name('applications-index');
Route::get('/create-application', [ApplicationController::class, 'indexForm'])->name('create-application');
Route::post('/submit-application', [ApplicationController::class, 'submit'])->name('submit-application');
Route::post('/delete-application/{id}', [ApplicationController::class, 'delete'])->name('delete-application');

/*
Admin Routes
*/

Route::get('/admin', [AdminController::class, 'index'])->name('admin-index');
Route::post('/admin/submit-login', [AdminController::class, 'login'])->name('admin-submit-login');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin-logout');

Route::get('/admin/spare-parts', [SparePartsController::class, 'index'])->name('admin-parts-index');
Route::get('/admin/add-new', [SparePartsController::class, 'addFormIndex'])->name('admin-add-form-index');
Route::post('/admin/submit-parts', [SparePartsController::class, 'create'])->name('admin-submit-parts');
Route::post('/admin/delete-part/{id}', [SparePartsController::class, 'delete'])->name('admin-delete-part');
Route::get('/admin/edit-part/{id}', [SparePartsController::class, 'editIndex'])->name('admin-edit-part');
Route::post('/admin/submit-edit-part/{id}', [SparePartsController::class, 'update'])->name('admin-submit-edit-part');
