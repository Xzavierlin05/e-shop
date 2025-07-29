<?php

use App\Http\Controllers\usercontroller;
use App\Http\Controllers\productscontroller;
use App\Models\products;
use App\Http\Controllers\cartcontroller;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login',[usercontroller::class,'login'])->name('login');

Route::post('/login',[usercontroller::class,'login_submit'])->name('login_submit');

Route::get('/register',[usercontroller::class,'register'])->name('register');

Route::post('/register',[usercontroller::class,'res_user'])->name('res_user');

Route::get('/',[productscontroller::class,'index'])->name('index');

Route::get('/showproduct/{id}',[productscontroller::class,'showproduct'])->name('product.show')->middleware('auth');

Route::get('/add_cart/{id}',[cartcontroller::class,'add_cart']);

Route::post('/add_cart/{id}',[cartcontroller::class,'add_cart'])->name('add_cart');

Route::get('/cart_list',[cartcontroller::class,'cart_list'])->name('cart_list');

Route::put('/checkout',[cartcontroller::class,'checkout'])->name('checkout');

Route::get('/history',[cartcontroller::class,'history'])->name('history');


