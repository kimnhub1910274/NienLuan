<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

//Frontend
Route::get('/', function () {
    return view('welcome');
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
// Route::get('/news',[HomeController::class, 'news']);


//Backend
Route::get('/admin',[AdminController::class, 'index']);
Route::get('/dashboard',[AdminController::class, 'dashboard']);