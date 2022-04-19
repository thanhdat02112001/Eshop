<?php

use App\Http\Controllers\Admin\Coupon\CouponController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Requests\CustomerRequest;
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

//Login route
Route::group(['prefix' => 'login', 'middleware' => 'checkLogin'], function () {
    Route::get('/', [\App\Http\Controllers\Admin\Auth\AuthController::class, 'getLogin']);
    Route::post('/', [\App\Http\Controllers\Admin\Auth\AuthController::class, 'postLogin']);
});

//Admin route
Route::group(['prefix' => 'admin', 'middleware' => 'checkAdmin'], function () {
    //Route dashboard
    Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'index']);
    Route::get('/logout', [\App\Http\Controllers\Admin\AdminController::class, 'logout']);
    //Route product
    Route::Group(["prefix" => "product"], function(){

        Route::get('/', [\App\Http\Controllers\Admin\Product\ProductController::class, "index"])->name('product-home');

        Route::get('/create',[\App\Http\Controllers\Admin\Product\ProductController::class, "create"])->name('product-create');

        Route::post('/store', [\App\Http\Controllers\Admin\Product\ProductController::class, "store"])->name("product-store");

        Route::get('/edit/{id}', [\App\Http\Controllers\Admin\Product\ProductController::class, "edit"])->name('product-edit');

        Route::post('/update/{id}', [\App\Http\Controllers\Admin\Product\ProductController::class, "update"])->name('product-update');

        Route::get('/delete/{id}', [\App\Http\Controllers\Admin\Product\ProductController::class, "delete"])->name('product-delete');

    });
    //Route category
    Route::Group(["prefix" => "category"], function(){

        Route::get('/', [\App\Http\Controllers\Admin\Category\CategoryController::class, "index"])->name('category-home');

        Route::post('/', [\App\Http\Controllers\Admin\Category\CategoryController::class, "store"])->name("category-store");

        Route::get('/edit/{id}', [\App\Http\Controllers\Admin\Category\CategoryController::class, "edit"])->name('category-edit');

        Route::post('/update/{id}', [\App\Http\Controllers\Admin\Category\CategoryController::class, "update"])->name('category-update');

        Route::get('/delete/{id}', [\App\Http\Controllers\Admin\Category\CategoryController::class, "delete"])->name('category-delete');

    });
    //Route user
    Route::Group(["prefix" => "user"], function(){

        Route::get('/', [\App\Http\Controllers\Admin\User\UserController::class, "index"])->name('user-home');

        Route::get('/create',[\App\Http\Controllers\Admin\User\UserController::class, "create"])->name('user-create');

        Route::post('/store', [\App\Http\Controllers\Admin\User\UserController::class, "store"])->name("user-store");

        Route::get('/edit/{id}', [\App\Http\Controllers\Admin\User\UserController::class, "edit"])->name('user-edit');

        Route::post('/update/{id}', [\App\Http\Controllers\Admin\User\UserController::class, "update"])->name("user-update");

        Route::get('/delete/{id}', [\App\Http\Controllers\Admin\User\UserController::class, "delete"])->name("user-delete");
    });
    //Route order
    Route::Group(["prefix" => "order"], function(){
        Route::get('/', [\App\Http\Controllers\Admin\Order\OrderController::class, "index"])->name('order.index');
        Route::get('/processed', [\App\Http\Controllers\Admin\Order\OrderController::class, "processed"])->name('order.processed');
        Route::get('/detail/{id}', [\App\Http\Controllers\Admin\Order\OrderController::class, "detail"])->name('order.detail');
        Route::post('/detail/{id}', [\App\Http\Controllers\Admin\Order\OrderController::class, "postDetail"])->name('order.postDetail');
    });

    //Route blog
    Route::Group(["prefix" => "blog"], function(){
        Route::get('/', [\App\Http\Controllers\Admin\Blog\BlogController::class, "index"])->name('blog-home');
        Route::get('/create', [\App\Http\Controllers\Admin\Blog\BlogController::class, "create"])->name("blog-create");
        Route::post('/store', [\App\Http\Controllers\Admin\Blog\BlogController::class, "store"])->name("blog-store");
        Route::get('/edit/{id}', [\App\Http\Controllers\Admin\Blog\BlogController::class, "edit"])->name('blog-edit');
        Route::post('/update/{id}', [\App\Http\Controllers\Admin\Blog\BlogController::class, "update"])->name('blog-update');
        Route::get('/delete/{id}', [\App\Http\Controllers\Admin\Blog\BlogController::class, "delete"])->name('blog-delete');
    });

    //Route contact
    Route::get('/contact', [\App\Http\Controllers\Admin\Contact\ContactController::class, "index"])->name('contact-home');
    Route::get('/contact/delete', [\App\Http\Controllers\Admin\Contact\ContactController::class, "delete"])->name('contact-delete');


});



/////////Frontend///////

/// Homepage route
Route::get('/', [\App\Http\Controllers\Frontend\HomePage\HomepPageController::class, 'index'])->name('client-index');
Route::get('/introduce', [\App\Http\Controllers\Frontend\HomePage\HomepPageController::class, 'introduce'])->name('client-introduce');
Route::get('/contact', [\App\Http\Controllers\Frontend\HomePage\HomepPageController::class, 'contact'])->name('client-contact');
Route::post('/contact/store', [\App\Http\Controllers\Frontend\HomePage\HomepPageController::class, 'contactStore'])->name('client-contact-store');
/// End HomePage route

/// Product route
Route::get('/product', [\App\Http\Controllers\Frontend\ProductPage\ProductController::class, 'index'])->name('client-product-index');
Route::get('/product/{id}', [\App\Http\Controllers\Frontend\ProductPage\ProductController::class, 'productDetail'])->name('client-product-detail');
/// End product route
//Customer
Route::prefix('customer')->group(function () {
    Route::get('/login', [CustomerController::class, 'getLogin'])->name('customer_get_login');
    Route::post('/login', [CustomerController::class, 'postLogin'])->name('customer_post_login');
    Route::get('/register', [CustomerController::class, 'getRegister'])->name('customer_get_register');
    Route::post('/register', [CustomerController::class, 'postRegister'])->name('customer_post_register');
    Route::get('/logout', [CustomerController::class, 'logout'])->name('logout');
});
//cart
Route::post('/add-to-cart', [CartController::class, "addToCart"]);
Route::get('/load-cart', [CartController::class, 'loadCart']);
Route::get('/cart', [CartController::class, 'index']);
Route::post('/update-cart', [CartController::class, 'updateCart']);
Route::post('/delete', [CartController::class, 'deleteFromCart']);
Route::post('/clear-all', [CartController::class, 'clearAll']);

/// Blog route
Route::get('/blog', [\App\Http\Controllers\Frontend\BlogPage\BlogPageController::class, 'index'])->name('client-blog-index');
Route::get('/blog/{id}', [\App\Http\Controllers\Frontend\BlogPage\BlogPageController::class, 'detail'])->name('client-blog-detail');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// checkout
Route::get('/checkout', [PaymentController::class, 'index'])->name('checkout');
Route::post('/checkout', [PaymentController::class, 'store'])->name('checkout_store');
Route::post('/checkout/vnpay', [PaymentController::class, 'vnpay'])->name('online-pay');
Route::get('/vnpay/return', [PaymentController::class, 'vnpayReturn'])->name('vnpay.return');
//buy now
Route::post('/buynow', [CartController::class, 'buyNow']);
//coupon
Route::resource('coupon', CouponController::class);
