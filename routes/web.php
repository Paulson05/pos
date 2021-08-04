<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
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
//product
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::post('/post-product', [ProductController::class, 'store']);
Route::get('/fetch-product', [ProductController::class, 'fetchProduct']);
Route::get('/edit-product/{id}', [ ProductController::class, 'edit']);
Route::put('/update-product/{id}', [ProductController::class, 'update']);
Route::delete('/delete-product/{id}', [ProductController::class, 'destroy']);

//unit
Route::get('/unit', [UnitController::class, 'index'])->name('unit.index');
Route::post('/post-unit', [UnitController::class, 'store']);
Route::get('/fetch-unit', [UnitController::class, 'fetchUnit']);
Route::get('/edit-unit/{id}', [UnitController::class, 'edit']);
Route::put('/update-unit/{id}', [UnitController::class, 'update']);
Route::delete('/delete-unit/{id}', [UnitController::class, 'destroy']);

//category
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::post('/post-category', [CategoryController::class, 'store']);
Route::get('/fetch-category', [CategoryController::class, 'fetchCategory']);
Route::get('/edit-category/{id}', [CategoryController::class, 'edit']);
Route::put('/update-category/{id}', [CategoryController::class, 'update']);
Route::delete('/delete-category/{id}', [CategoryController::class, 'destroy']);


//supplier
Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier.index');
Route::post('/post-supplier', [SupplierController::class, 'store']);
Route::get('/fetchproduct', [SupplierController::class, 'fetchproduct']);
Route::get('/edit-supplier/{id}', [SupplierController::class, 'edit']);
Route::put('/update-product/{id}', [SupplierController::class, 'update']);
Route::delete('/delete-supplier/{id}', [SupplierController::class, 'destroy']);

//customer
Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
Route::post('/post-customer', [CustomerController::class, 'store']);
Route::get('/fetchcustomer', [CustomerController::class, 'fetchcustomer']);
Route::get('/edit-customer/{id}', [CustomerController::class, 'edit']);
Route::put('/update-customer/{id}', [CustomerController::class, 'update']);
Route::delete('/delete-customer/{id}', [CustomerController::class, 'destroy']);

//purchase


Route::get('/purchase', [PurchaseController::class, 'index'])->name('purchase.index');
Route::post('/post-purchase', [PurchaseController::class, 'store']);
Route::get('/fetchpurchase', [PurchaseController::class, 'fetchpurchase']);
Route::get('/edit-purchase/{id}', [PurchaseController::class, 'edit']);
Route::put('/update-purchase/{id}', [PurchaseController::class, 'update']);
Route::delete('/delete-purchase/{id}', [PurchaseController::class, 'destroy']);
Route::post('/store-purchase', [PurchaseController::class, 'store'])->name('purchase.store');
Route::get('/purchaselist', [PurchaseController::class, 'purchaseList'])->name('purchase-list');
Route::get('/pendinglist', [PurchaseController::class, 'pendingList'])->name('pending.list');
Route::get('/approved/purchase/{id}', [PurchaseController::class, 'approve'])->name('purchase.approve');

// invoice
Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice.index');
Route::get('/invoice/pending', [InvoiceController::class, 'invoiceList'])->name('invoice.list');
//Route::get('/invoiceapproval', [InvoiceController::class, 'pendingList'])->name('invoicepending.list');

Route::get('/get-stock', [DefaultController::class, 'getStock'])->name('check-product-stock');
Route::post('invoice/store',[InvoiceController::class, 'store'])->name('invoice.store');
Route::get('invoice/add',[InvoiceController::class, 'add'])->name('invoice.add');
Route::get('/approved/invoice/{id}', [InvoiceController::class, 'approve'])->name('invoice.approve');
Route::post('approval/store/{id}',[InvoiceController::class, 'approvelStore'])->name('approval.store');




// default
Route::get('/get-category', [DefaultController::class, 'getCategory'])->name('get-category');
Route::get('/get-product', [DefaultController::class, 'getProduct'])->name('get-product');









Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
