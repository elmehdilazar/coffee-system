<?php

use App\Models\Order\Reviews;
use App\Models\Product\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserController;
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
    $products = Product::select()->orderBy('id', 'DESC')->take("4")->get();
    $reviews = Reviews::select()->orderBy('id', 'DESC')->take("6")->get();
    return view('home', compact("products", "reviews"));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('/services', [App\Http\Controllers\HomeController::class, 'services'])->name('services');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');

Route::prefix('products')->group(function () {
    Route::get('singleProduct/{id}',[ProductsController::class,'singleProduct'])->name('product.single');
    Route::post('singleProduct/{id}',[ProductsController::class,'addCart'])->name('cart.add')->middleware("auth:web");
    Route::get('menu',[ProductsController::class,'menu'])->name('product.menu');
});

Route::prefix('cart')->group(function () {

        Route::get('show', [ProductsController::class, 'showCart'])->name('cart.show')->middleware("auth:web");
        Route::delete('delete/{id}', [ProductsController::class, 'deleteCart'])->name('cart.delete')->middleware("auth:web");
        Route::post('precheck', [ProductsController::class, 'prepareCheckout'])->name('cart.precheck')->middleware("auth:web");
        Route::get('checkout', [ProductsController::class, 'checkout'])->name('cart.checkout')->middleware("check.for.price");
        Route::post('checkout', [ProductsController::class, 'storeOrder'])->name('checkout.proccessing')->middleware("check.for.price");
        Route::get('paiment', [ProductsController::class, 'paypal_check'])->name('checkout.paiment')->middleware("check.for.price");
        Route::get('success_paiment', [ProductsController::class, 'success_paiment'])->name('checkout.success_paiment')->middleware("check.for.price");
});
Route::prefix('user')->middleware("auth:web")->group(function () {
 Route::post('Add_booking',[UserController::class, 'booking'])->name("book");
 Route::get('Display_orders',[UserController::class, 'displaysOrders'])->name("user.orders");
 Route::get('Display_booking',[UserController::class, 'displaysBooking'])->name("user.booking");
 Route::get('review/{id}/{type}',[UserController::class, 'AddReview'])->name("user.review");
 Route::post('review/{id}/{type}',[UserController::class, 'proccessingreview'])->name("user.reviewsend");
});
Route::get('admins/login', function () {
    return view("admin.login");
})->name("admin.login")->middleware("check.for.auth");

Route::prefix('admins')->middleware('auth:admin')->group(function () {

    Route::get('/',function ()  {
return view("admin.index");
    })->name('admin.home');
    Route::get('/Alladmins',function ()  {
return view("admin.admins");
    })->name('admin.all');

    Route::prefix('product')->group(function () {
        Route::get('/',function ()  {
    return view("admin.products");
        })->name('admin.products');

    });
});

