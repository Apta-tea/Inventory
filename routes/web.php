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

    });
    Route::group(['middleware' => ['check_login:staff']], function () {
        Route::get('staff', [StaffController::class, 'index']);
    });
});