<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\StaffController;

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
    return view('Auth.login');
});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class,'proc_login']);
Route::get('logout', [AuthController::class,'logout']);
Route::get('admin', [AdminController::class, 'index']);

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['check_login:super']], function () {
        Route::get('admin', [AdminController::class, 'index']);
        Route::resource('customer', App\Http\Controllers\CustomerController::class);
        Route::resource('supplier', App\Http\Controllers\SupplierController::class);
        Route::resource('purchase', App\Http\Controllers\PurchaseController::class);
        Route::resource('invoice', App\Http\Controllers\InvoiceController::class);
        Route::resource('user', App\Http\Controllers\Admin\UserController::class);
        Route::post('user/search', [App\Http\Controllers\Admin\UserController::class,'search']);
        Route::get('profile', [App\Http\Controllers\Admin\UserController::class, 'profile'])->name('profile');
        Route::patch('profile_update/{user}', [App\Http\Controllers\Admin\UserController::class, 'profile_update']);
        Route::get('profile/{user}/edit',[App\Http\Controllers\Admin\UserController::class, 'profile_edit']);
        Route::resource('country', App\Http\Controllers\Admin\CountryController::class);
        Route::post('country/search', [App\Http\Controllers\Admin\CountryController::class,'search']);
        Route::resource('unit', App\Http\Controllers\Admin\UnitController::class);
        Route::post('unit/search', [App\Http\Controllers\Admin\UnitController::class,'search']);
        Route::resource('company', App\Http\Controllers\Admin\CompanyController::class);
        Route::post('company/search', [App\Http\Controllers\Admin\CompanyController::class,'search']);

    });
    Route::group(['middleware' => ['check_login:staff']], function () {
        Route::get('staff', [StaffController::class, 'index']);
    });
    Route::resource('category', App\Http\Controllers\CategoryController::class);
    Route::post('category/search', [App\Http\Controllers\CategoryController::class,'search']);
    Route::resource('scat', App\Http\Controllers\SubCategoryController::class);
    Route::post('scat/search', [App\Http\Controllers\SubCategoryController::class,'search']);
    Route::resource('customer', App\Http\Controllers\CustomerController::class);
    Route::post('customer/search', [App\Http\Controllers\CustomerController::class,'search']);
});