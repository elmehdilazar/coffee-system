<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Products\ProductsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('products')->group(function () {
    Route::get('singleProduct/{id}',[ProductsController::class,'singleProduct'])->name('product.single');
    Route::post('singleProduct/{id}',[ProductsController::class,'addCart'])->name('cart.add');
});

Route::prefix('cart')->group(function () {

        Route::get('show', [ProductsController::class, 'showCart'])->name('cart.show');
        Route::delete('delete/{id}', [ProductsController::class, 'deleteCart'])->name('cart.delete');
});


