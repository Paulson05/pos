<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Route;

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
    return view('backend.template.default');
});
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/unit', [UnitController::class, 'index'])->name('unit.index');
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier.index');
Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
