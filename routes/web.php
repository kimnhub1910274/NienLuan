<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

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
Route::get('/product', function () {
    return view('product');

});

Route::get('/',[HomeController::class, 'index']);
Route::get('/home',[HomeController::class, 'index']);
// category products - home
Route::get('/category-products/{cate_id}',[CategoryProduct::class, 'show_cate_home']);
Route::get('/product-detail/{product_id}',[ProductController::class, 'product_detail']);


//Backend
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/dashboard', [AdminController::class, 'show_dashboard']);
Route::post('/admin_dashboard', [AdminController::class, 'dashboard']);
Route::get('/logout', [AdminController::class, 'logout']);

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
