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
    Route::resource('customer', App\Http\Controllers\CustomerController::class);
    Route::resource('supplier', App\Http\Controllers\SupplierController::class);
    Route::resource('category', App\Http\Controllers\CategoryController::class);
    Route::post('category/search', [App\Http\Controllers\CategoryController::class,'search']);
    Route::resource('scat', App\Http\Controllers\SubCategoryController::class);
    Route::post('scat/search', [App\Http\Controllers\SubCategoryController::class,'search']);
    Route::resource('customer', App\Http\Controllers\CustomerController::class);
    Route::post('customer/search', [App\Http\Controllers\CustomerController::class,'search']);
    Route::resource('supplier', App\Http\Controllers\SupplierController::class);
    Route::post('supplier/search', [App\Http\Controllers\SupplierController::class,'search']);
    Route::resource('product', App\Http\Controllers\ProductController::class);
    Route::post('product/search', [App\Http\Controllers\ProductController::class,'search']);
    Route::resource('purchase', App\Http\Controllers\PurchaseController::class);
    Route::post('purchase/get_supplier', [App\Http\Controllers\PurchaseController::class,'get_supplier']);
    Route::post('purchase/get_product', [App\Http\Controllers\PurchaseController::class,'get_product']);
    Route::post('purchase/search', [App\Http\Controllers\PurchaseController::class,'search']);
    Route::get('purchase/download/{purchase}',[App\Http\Controllers\PurchaseController::class,'download']);
    Route::get('purchase/export/{purchase}',[App\Http\Controllers\PurchaseController::class,'export']);
    Route::resource('manufacture', App\Http\Controllers\ManufactureController::class);
    Route::post('manufacture/get_supplier', [App\Http\Controllers\ManufactureController::class,'get_supplier']);
    Route::post('manufacture/get_product', [App\Http\Controllers\ManufactureController::class,'get_product']);
    Route::post('manufacture/search', [App\Http\Controllers\ManufactureController::class,'search']);
    Route::get('manufacture/download/{manufacture}',[App\Http\Controllers\ManufactureController::class,'download']);
    Route::get('manufacture/export/{manufacture}',[App\Http\Controllers\ManufactureController::class,'export']);
    Route::resource('invoice', App\Http\Controllers\InvoiceController::class);
    Route::post('invoice/get_customer', [App\Http\Controllers\InvoiceController::class,'get_customer']);
    Route::post('invoice/get_product', [App\Http\Controllers\InvoiceController::class,'get_product']);
    Route::post('invoice/search', [App\Http\Controllers\InvoiceController::class,'search']);
    Route::get('invoice/export/{invoice}',[App\Http\Controllers\InvoiceController::class,'export']);
    Route::get('invoice/download/{invoice}',[App\Http\Controllers\InvoiceController::class,'download']);
    Route::get('report/get_storage', [App\Http\Controllers\ReportController::class,'get_storage']);
    Route::get('report', [App\Http\Controllers\ReportController::class,'index']);
    Route::resource('material', App\Http\Controllers\RawController::class);
    Route::post('material/get_company', [App\Http\Controllers\RawController::class,'get_company']);
    Route::post('material/get_product', [App\Http\Controllers\RawController::class,'get_product']);
    Route::post('material/search', [App\Http\Controllers\RawController::class,'search']);
    Route::get('material/download/{material}',[App\Http\Controllers\RawController::class,'download']);
    Route::get('material/export/{material}',[App\Http\Controllers\RawController::class,'export']);

});