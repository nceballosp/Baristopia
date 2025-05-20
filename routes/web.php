<?php

// NCP, JJVG, SCL

use Illuminate\Support\Facades\Route;

// Home
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');

// Product
Route::get('/product', 'App\Http\Controllers\ProductController@index')->name('product.index');
Route::get('/product/create', 'App\Http\Controllers\ProductController@create')->middleware('auth')->name('product.create');
Route::post('/product/save', 'App\Http\Controllers\ProductController@save')->name('product.save');
Route::get('/product/random', 'App\Http\Controllers\ProductController@random')->name('product.random');
Route::get('/product/{id}', 'App\Http\Controllers\ProductController@show')->name('product.show');
Route::delete('/product/delete', 'App\Http\Controllers\ProductController@delete')->name('product.delete');

// Recipe
Route::get('/recipe', 'App\Http\Controllers\RecipeController@index')->name('recipe.index');
Route::get('/recipe/create', 'App\Http\Controllers\RecipeController@create')->middleware('auth')->name('recipe.create');
Route::post('/recipe/save', action: 'App\Http\Controllers\RecipeController@save')->name('recipe.save');
Route::get('/recipe/{id}', 'App\Http\Controllers\RecipeController@show')->name('recipe.show');
Route::delete('/recipe/delete', "App\Http\Controllers\RecipeController@delete")->name('recipe.delete');

// Payment
Route::get('/payment', 'App\Http\Controllers\PaymentController@index')->name('payment.index');
Route::get('/payment/summary/{id}', 'App\Http\Controllers\PaymentController@summary')->name('payment.summary');
Route::get('/payment/summary/{id}/pdf', 'App\Http\Controllers\PaymentController@pdf')->name('payment.pdf');
Route::post('/payment/process', 'App\Http\Controllers\PaymentController@process')->name('payment.process');
Route::delete('/payment/delete', "App\Http\Controllers\PaymentController@delete")->name('payment.delete');

// Order
Route::delete('/order/delete', "App\Http\Controllers\OrderController@delete")->name('order.delete');
Route::post('/order/checkout', "App\Http\Controllers\OrderController@checkout")->name('order.checkout');

// Cart
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index');
Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name('cart.add');
Route::get('/cart/remove/{id}', 'App\Http\Controllers\CartController@remove')->name('cart.remove');
Route::get('/cart/removeAll/', 'App\Http\Controllers\CartController@removeAll')->name('cart.removeAll');

//Admin
Route::get('/admin', 'App\Http\Controllers\AdminHomeController@index')->middleware(['auth', 'admin'])->name('admin.dashboard');

Route::get('/admin/payment', 'App\Http\Controllers\AdminPaymentController@index')->middleware(['auth', 'admin'])->name('admin.payment.index');
Route::get('/admin/payment/create', 'App\Http\Controllers\AdminPaymentController@create')->middleware(['auth', 'admin'])->name('admin.payment.create');
Route::post('/admin/payment/save',  'App\Http\Controllers\AdminPaymentController@save')->middleware(['auth', 'admin'])->name('admin.payment.save');
Route::get('/admin/payment/show', 'App\Http\Controllers\AdminPaymentController@show')->middleware(['auth', 'admin'])->name('admin.payment.show');

Route::get('/admin/order', 'App\Http\Controllers\AdminOrderController@index')->middleware(['auth', 'admin'])->name('admin.order.index');
Route::get('/admin/order/create', 'App\Http\Controllers\AdminOrderController@create')->middleware(['auth', 'admin'])->name('admin.order.create');
Route::post('/admin/order/save',  'App\Http\Controllers\AdminOrderController@save')->middleware(['auth', 'admin'])->name('admin.order.save');
Route::get('/admin/order/show', 'App\Http\Controllers\AdminOrderController@show')->middleware(['auth', 'admin'])->name('admin.order.show');

Auth::routes();
