<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//Frontend
Route::get('/news', function () {
    return view('news');
});
Route::get('/home', function () {
    return view('welcome');

});
Route::get('/news', function () {
    return view('news');

});
Route::get('/introduce', function () {
    return view('introduce');

});


Route::get('/',[HomeController::class, 'index']);
Route::get('/home',[HomeController::class, 'index']);
Route::get('/product',[HomeController::class, 'product']);
Route::post('/search', [HomeController::class, 'search']);

// category products - home
Route::get('/category-products/{cate_id}',[CategoryProduct::class, 'show_cate_home']);
Route::get('/product-detail/{product_id}',[ProductController::class, 'product_detail']);


//Backend
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/dashboard', [AdminController::class, 'show_dashboard']);
Route::post('/admin_dashboard', [AdminController::class, 'dashboard']);
Route::get('/logout', [AdminController::class, 'logout']);
Route::post('/admin_search', [AdminController::class, 'admin_search']);



//category product
Route::get('/add-category-product', [CategoryProduct::class, 'add_category_product']);
Route::get('/list-category-product', [CategoryProduct::class, 'list_category_product']);
Route::get('/edit-category-product/{category_id}', [CategoryProduct::class, 'edit_category_product']);
Route::get('/delete-category-product/{category_id}', [CategoryProduct::class, 'delete_category_product']);
Route::post('/update-category-product/{category_id}', [CategoryProduct::class, 'update_category_product']);
Route::post('/category-product', [CategoryProduct::class, 'save_category_product']);
Route::get('/on-cate/{category_id}', [CategoryProduct::class, 'on_cate']);
Route::get('/off-cate/{category_id}', [CategoryProduct::class, 'off_cate']);

//product
Route::get('/add-product', [ProductController::class, 'add_product']);
Route::get('/list-product', [ProductController::class, 'list_product']);
Route::get('/edit-product/{product_id}', [ProductController::class, 'edit_product']);
Route::get('/delete-product/{product_id}', [ProductController::class, 'delete_product']);
Route::post('/update-product/{product_id}', [ProductController::class, 'update_product']);
Route::post('/save-product', [ProductController::class, 'save_product']);
Route::get('/on-pro/{product_id}', [ProductController::class, 'on_pro']);
Route::get('/off-pro/{product_id}', [ProductController::class, 'off_pro']);

//cart
Route::post('/save-cart', [CartController::class, 'save_cart']);
Route::get('/show-cart', [CartController::class, 'cart']);
Route::get('/delete-to-cart/{id}', [CartController::class, 'delete_to_cart']);
Route::post('/increase-to-cart', [CartController::class, 'increase_to_cart']);
Route::post('/reduce-to-cart', [CartController::class, 'reduce_to_cart']);

// checkout

Route::get('/login-checkout', [CheckoutController::class, 'login_checkout']);
Route::get('/sign-up', [CheckoutController::class, 'sign_up']);
Route::get('/login', [CheckoutController::class, 'login']);
Route::post('/login-customer', [CheckoutController::class, 'login_customer']);
Route::get('/log-out', [CheckoutController::class, 'log_out']);
Route::post('/add-customer', [CheckoutController::class, 'add_customer']);
Route::get('/check-out', [CheckoutController::class, 'check_out']);
Route::get('/delete-to-checkout/{id}', [CheckoutController::class, 'delete_to_checkout']);
Route::post('/save-checkout', [CheckoutController::class, 'save_checkout']);
Route::get('/payment', [CheckoutController::class, 'payment']);
Route::post('/order', [CheckoutController::class, 'order']);


//orders
Route::get('/manage-order', [CheckoutController::class, 'manage_order']);
Route::get('/manage-customer', [CheckoutController::class, 'manage_customer']);
Route::get('/view-order/{orderId}', [CheckoutController::class, 'view_order']);




