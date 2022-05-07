<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\FrontedController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [FrontedController::class, 'index']);
// Route::get('/testpay', [FrontedController::class, 'testPay']);
Route::get('/about', [FrontedController::class, 'about']);
Route::get('/contact', [FrontedController::class, 'contact']);
Route::get('/shop', [FrontedController::class, 'shop']);
Route::get('/contact', [FrontedController::class, 'contact']);
Route::get('/category/{id}/{name}', [FrontedController::class, 'prodCategory']);
Route::get('/accessories', [FrontedController::class, 'accessories']);
Route::get('/shop', [FrontedController::class, 'shop']);
Route::get('/single-product/{id}/{name}', [FrontedController::class, 'singleProduct']);
Route::post('/add-to-cart', [FrontedController::class, 'addToCart']);


Auth::routes();

Route::group(['middleware' => ['auth']], function ()
{
    Route::get('/cart', [FrontedController::class, 'cart'])->name('cart');
    Route::get('/cart-update/{id}', [FrontedController::class, 'updateCart']);
    Route::get('/cart-remove/{id}/{name}', [FrontedController::class, 'removeCartProd']);
    Route::get('/checkout', [CheckoutController::class, 'index']);
    Route::post('/place-order', [CheckoutController::class, 'store']);
    // Route::post('/pay', [PaymentController::class, 'redirectToGateway'])->name('pay');
    Route::get('/payment/callback', [PaymentController::class, 'handleGatewayCallback']);
    Route::get('/thank-you', [CheckoutController::class, 'show']);
});

Route::group(['middleware' => ['auth', 'isAdmin']], function(){


    Route::get('/admin/dashboard', [HomeController::class, 'show']);
    Route::get('/admin/category', [CategoryController::class, 'index'])->name('cats');

    /* Category Route */
    Route::get('/add-category', [CategoryController::class, 'show']);
    Route::post('/create-category', [CategoryController::class, 'insert']);
    Route::get('/cate-view/{id}', [CategoryController::class, 'showCat']);
    Route::get('/back', [CategoryController::class, 'backCat']);
    Route::get('/cate-edit/{id}', [CategoryController::class, 'showedit']);
    Route::post('/cate-edit/{id}', [CategoryController::class, 'updateCats']);
    Route::get('/cate-delete/{id}', [CategoryController::class, 'delete']);

    /* Product Routes */
    Route::get('/products', [ProductController::class, 'index'])->name('products');
    Route::get('/product/create', [ProductController::class, 'create']);
    Route::post('/product/create', [ProductController::class, 'store']);
    Route::get('/product/{id}', [ProductController::class, 'show']);
    Route::get('/back', [ProductController::class, 'backProduct']);
    Route::get('/product/{id}/edit', [ProductController::class, 'edit']);
    Route::post('/edit-product/{id}', [ProductController::class, 'update']);
    Route::get('/product/{id}/delete', [ProductController::class, 'destroy']);

});
