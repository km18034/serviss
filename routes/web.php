<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminRegisterController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\SparePartsController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CarsController;
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
Route::post('/cancle-application/{id}', [ApplicationController::class, 'cancle'])->name('cancle-application');

/*
Admin Routes
*/

Route::get('/admin', [AdminController::class, 'index'])->name('admin-index');
Route::post('/admin/submit-login', [AdminController::class, 'login'])->name('admin-submit-login');
Route::get('/admin/dashboard/{id?}', [AdminController::class, 'dashboard'])->name('admin-dashboard')->middleware('is_admin');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin-logout')->middleware('is_admin');
Route::post('/admin/application-edit-status/{id}', [AdminController::class, 'updateStatus'])->name('admin-update-application-status')->middleware('is_admin');
Route::post('/admin/delete-application/{id}', [AdminController::class, 'deleteApplication'])->name('admin-delete-application')->middleware('is_admin');
Route::get('/admin/admin-profile', [AdminController::class, 'profileIndex'])->name('admin-profile-index')->middleware('is_admin');
Route::get('/admin/admin-edit-profile/{id}', [AdminController::class, 'editProfileIndex'])->name('admin-edit-profile-index')->middleware('is_admin');
Route::post('/admin/submit-admin-edit-profile/{id}', [AdminController::class, 'updateProfile'])->name('admin-submit-edit-profile')->middleware('is_admin');
Route::post('/admin/admin-delete-profile/{id}', [AdminController::class, 'deleteProfile'])->name('admin-delete-profile')->middleware('is_admin');
Route::post('/admin/admin-spare-part-order/{id?}',[AdminController::class, 'saveSparePartAmount'])->name('admin-order-part-amount')->middleware('is_admin');
Route::get('/admin/admin-application-view/{id}', [AdminController::class, 'viewApplication'])->name('admin-view-application')->middleware('is_admin');
Route::post('/admin/admin-filter-application/{id}', [AdminController::class, 'filterApplication'])->name('admin-filter-application-by-me')->middleware('is_admin');
Route::get('/admin/history', [AdminController::class, 'history'])->name('admin-history')->middleware('is_admin');

Route::get('/admin/spare-parts', [SparePartsController::class, 'index'])->name('admin-parts-index')->middleware('is_admin');
Route::get('/admin/add-new-part', [SparePartsController::class, 'addFormIndex'])->name('admin-add-form-index')->middleware('is_admin');
Route::post('/admin/submit-parts', [SparePartsController::class, 'create'])->name('admin-submit-parts')->middleware('is_admin');
Route::post('/admin/delete-part/{id}', [SparePartsController::class, 'delete'])->name('admin-delete-part')->middleware('is_admin');
Route::get('/admin/edit-part/{id}', [SparePartsController::class, 'editIndex'])->name('admin-edit-part')->middleware('is_admin');
Route::post('/admin/submit-edit-part/{id}', [SparePartsController::class, 'update'])->name('admin-submit-edit-part')->middleware('is_admin');

Route::get('/admin/cars', [CarsController::class, 'index'])->name('admin-cars-index')->middleware('is_admin');
Route::get('/admin/auto-brand', [CarsController::class, 'autoBrandsIndex'])->name('admin-auto-brands-index')->middleware('is_admin');
Route::get('/admin/edit-auto-brand/{id}', [CarsController::class, 'brandEditIndex'])->name('admin-auto-brands-edit-index')->middleware('is_admin');
Route::post('/admin/submit-edit-auto-brand/{id}', [CarsController::class, 'updateBrand'])->name('admin-submit-edit-brand')->middleware('is_admin');
Route::get('/admin/add-new-auto-brand', [CarsController::class, 'addBrandFormIndex'])->name('admin-add-brand-form-index')->middleware('is_admin');
Route::get('/admin/add-new-auto-model', [CarsController::class, 'addModelFormIndex'])->name('admin-add-model-form-index')->middleware('is_admin');
Route::post('/admin/submit-auto-brand', [CarsController::class, 'createAutoBrand'])->name('admin-submit-auto-brand')->middleware('is_admin');
Route::post('/admin/submit-auto-model', [CarsController::class, 'createAutoModel'])->name('admin-submit-auto-model')->middleware('is_admin');
Route::get('/admin/edit-car/{id}', [CarsController::class, 'editIndex'])->name('admin-edit-car')->middleware('is_admin');
Route::post('/admin/submit-edit-car/{id}', [CarsController::class, 'update'])->name('admin-submit-edit-car')->middleware('is_admin');

Route::get('/admin/services', [ServicesController::class, 'index'])->name('admin-services-index')->middleware('is_admin');
Route::get('/admin/add-new-service', [ServicesController::class, 'addFormIndex'])->name('admin-add-form-index-service')->middleware('is_admin');
Route::post('/admin/submit-service', [ServicesController::class, 'create'])->name('admin-submit-service')->middleware('is_admin');
Route::post('/admin/delete-service/{id}', [ServicesController::class, 'delete'])->name('admin-delete-service')->middleware('is_admin');
Route::get('/admin/edit-service/{id}', [ServicesController::class, 'editIndex'])->name('admin-edit-service')->middleware('is_admin');
Route::post('/admin/submit-edit-service/{id}', [ServicesController::class, 'update'])->name('admin-submit-edit-service')->middleware('is_admin');

Route::get('/admin/users', [AdminRegisterController::class, 'index'])->name('admin-users-index')->middleware('is_admin');
Route::get('/admin/add-new-user', [AdminRegisterController::class, 'addFormIndex'])->name('admin-user-add-index')->middleware('is_admin');
Route::post('/admin/submit-user', [AdminRegisterController::class, 'create'])->name('admin-submit-user')->middleware('is_admin');
Route::post('/admin/delete-user/{id}', [AdminRegisterController::class, 'delete'])->name('admin-delete-user')->middleware('is_admin');
Route::get('/admin/edit-user/{id}', [AdminRegisterController::class, 'editIndex'])->name('admin-edit-user')->middleware('is_admin');
Route::post('/admin/submit-edit-user/{id}', [AdminRegisterController::class, 'update'])->name('admin-submit-edit-user')->middleware('is_admin');