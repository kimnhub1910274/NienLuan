<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

//Frontend
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('pages.home');

});
Route::get('/test', function () {
    return view('welcome');

});
Route::get('news', function () {
    return view('news');

});
Route::get('introduce', function () {
    return view('introduce');

});
Route::get('product', function () {
    return view('product');

});
// Route::get('/news',[HomeController::class, 'news']);


//Backend
Route::get('/admin',[AdminController::class, 'index']);
Route::get('/dashboard',[AdminController::class, 'show_dashboard']);
Route::post('/admin_dashboard',[AdminController::class, 'dashboard']);
Route::get('/logout',[AdminController::class, 'logout']);
