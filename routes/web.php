<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Products\ProductsController;
use App\Http\Controllers\User\UserController;

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
    Route::get('menu',[ProductsController::class,'menu'])->name('product.menu');
});

Route::prefix('cart')->group(function () {

        Route::get('show', [ProductsController::class, 'showCart'])->name('cart.show');
        Route::delete('delete/{id}', [ProductsController::class, 'deleteCart'])->name('cart.delete');
        Route::post('precheck', [ProductsController::class, 'prepareCheckout'])->name('cart.precheck');
        Route::get('checkout', [ProductsController::class, 'checkout'])->name('cart.checkout')->middleware("check.for.price");
        Route::post('checkout', [ProductsController::class, 'storeOrder'])->name('checkout.proccessing')->middleware("check.for.price");
        Route::get('paiment', [ProductsController::class, 'paypal_check'])->name('checkout.paiment')->middleware("check.for.price");
        Route::get('success_paiment', [ProductsController::class, 'success_paiment'])->name('checkout.success_paiment')->middleware("check.for.price");
});
Route::prefix('user')->group(function () {
 Route::post('Add_booking',[UserController::class, 'booking'])->name("book");
 Route::get('Display_orders',[UserController::class, 'displaysOrders'])->name("user.orders");
 Route::get('Display_booking',[UserController::class, 'displaysBooking'])->name("user.booking");
 Route::get('review/{id}/{type}',[UserController::class, 'AddReview'])->name("user.review");
 Route::post('review/{id}/{type}',[UserController::class, 'proccessingreview'])->name("user.reviewsend");
});

