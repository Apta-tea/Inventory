<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AdminController;
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

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['check_login:super']], function () {
        Route::get('admin', [AdminController::class, 'index']);
        Route::resource('customer', App\Http\Controllers\CustomerController::class);
        Route::resource('supplier', App\Http\Controllers\SupplierController::class);
        Route::resource('purchase', App\Http\Controllers\PurchaseController::class);
        Route::resource('invoice', App\Http\Controllers\InvoiceController::class);
        Route::resource('user', App\Http\Controllers\UserController::class);
        Route::get('profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
        Route::patch('profile_update/{user}', [App\Http\Controllers\UserController::class, 'profile_update']);
        Route::get('profile/{user}/edit',[App\Http\Controllers\UserController::class, 'profile_edit']);
        Route::resource('country', App\Http\Controllers\CountryController::class);
        Route::post('country/search', [App\Http\Controllers\CountryController::class,'search']);
        Route::resource('unit', App\Http\Controllers\UnitController::class);
        Route::post('unit/search', [App\Http\Controllers\UnitController::class,'search']);
        Route::resource('company', App\Http\Controllers\CompanyController::class);
        Route::post('company/search', [App\Http\Controllers\CompanyController::class,'search']);

    });
    Route::group(['middleware' => ['check_login:super','check_login:staff']], function () {
        Route::get('staff', [StaffController::class, 'index']);
    });
});