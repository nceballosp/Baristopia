<?php

// NCP, JJVG, SCL

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\Api\MapController;

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
Route::post('/recipe/save',  'App\Http\Controllers\RecipeController@save')->name('recipe.save');
Route::get('/recipe/{id}', 'App\Http\Controllers\RecipeController@show')->name('recipe.show');
Route::delete('/recipe/delete', 'App\Http\Controllers\RecipeController@delete')->name('recipe.delete');

// Map
Route::get('/map', 'App\Http\Controllers\MapController@index')->name('map.index');
Route::get('/map/create', 'App\Http\Controllers\MapController@create')->middleware('auth')->name('map.create');
Route::post('/map/save', 'App\Http\Controllers\MapController@save')->name('map.save');
Route::get('/map/{id}', 'App\Http\Controllers\MapController@show')->name('map.show');
Route::delete('/map/delete', 'App\Http\Controllers\MapController@delete')->name('map.delete');

// Payment
Route::get('/payment', 'App\Http\Controllers\PaymentController@index')->name('payment.index');
Route::get('/payment/summary/{id}', 'App\Http\Controllers\PaymentController@summary')->name('payment.summary');
Route::get('/payment/summary/{id}/pdf', 'App\Http\Controllers\PaymentController@pdf')->name('payment.pdf');
Route::post('/payment/process', 'App\Http\Controllers\PaymentController@process')->name('payment.process');
Route::delete('/payment/delete', 'App\Http\Controllers\PaymentController@delete')->name('payment.delete');

// Order
Route::delete('/order/delete', 'App\Http\Controllers\OrderController@delete')->name('order.delete');
Route::post('/order/checkout', 'App\Http\Controllers\OrderController@checkout')->name('order.checkout');

// Cart
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index');
Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name('cart.add');
Route::get('/cart/remove/{id}', 'App\Http\Controllers\CartController@remove')->name('cart.remove');
Route::get('/cart/removeAll/', 'App\Http\Controllers\CartController@removeAll')->name('cart.removeAll');

// Admin
Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->middleware(['auth', 'admin'])->name('admin.dashboard');

Route::get('/admin/payment', 'App\Http\Controllers\Admin\AdminPaymentController@index')->middleware(['auth', 'admin'])->name('admin.payment.index');
Route::get('/admin/payment/create', 'App\Http\Controllers\Admin\AdminPaymentController@create')->middleware(['auth', 'admin'])->name('admin.payment.create');
Route::get('/admin/payment/edit/{id}', 'App\Http\Controllers\Admin\AdminPaymentController@edit')->middleware(['auth', 'admin'])->name('admin.payment.edit');
Route::post('/admin/payment/save', 'App\Http\Controllers\Admin\AdminPaymentController@save')->middleware(['auth', 'admin'])->name('admin.payment.save');
Route::post('/admin/payment/update',  'App\Http\Controllers\Admin\AdminPaymentController@update')->middleware(['auth', 'admin'])->name('admin.payment.update');
Route::get('/admin/payment/show/{id}', 'App\Http\Controllers\Admin\AdminPaymentController@show')->middleware(['auth', 'admin'])->name('admin.payment.show');
Route::delete('/admin/payment/delete', 'App\Http\Controllers\Admin\AdminPaymentController@delete')->middleware(['auth', 'admin'])->name('admin.payment.delete');

Route::get('/admin/order', 'App\Http\Controllers\Admin\AdminOrderController@index')->middleware(['auth', 'admin'])->name('admin.order.index');
Route::get('/admin/order/create', 'App\Http\Controllers\Admin\AdminOrderController@create')->middleware(['auth', 'admin'])->name('admin.order.create');
Route::get('/admin/order/edit/{id}', 'App\Http\Controllers\Admin\AdminOrderController@edit')->middleware(['auth', 'admin'])->name('admin.order.edit');
Route::post('/admin/order/save', 'App\Http\Controllers\Admin\AdminOrderController@save')->middleware(['auth', 'admin'])->name('admin.order.save');
Route::post('/admin/order/update',  'App\Http\Controllers\Admin\AdminOrderController@update')->middleware(['auth', 'admin'])->name('admin.order.update');
Route::get('/admin/order/show/{id}', 'App\Http\Controllers\Admin\AdminOrderController@show')->middleware(['auth', 'admin'])->name('admin.order.show');
Route::delete('admin/order/delete', "App\Http\Controllers\Admin\AdminOrderController@delete")->middleware(['auth', 'admin'])->name('admin.order.delete');

//Services
Route::get('/services/products', 'App\Http\Controllers\AlliesServicesController@index')->name('service.product.index');

Route::delete('admin/order/delete', "App\Http\Controllers\AdminOrderController@delete")->middleware(['auth', 'admin'])->name('admin.order.delete');

// Auth
Auth::routes();

// Rutas del maps
Route::get('/maps', 'App\Http\Controllers\Api\MapController@index')->name('map.index');
Route::get('/maps/{id}', 'App\Http\Controllers\Api\MapController@show')->name('map.show');
Route::post('/maps', 'App\Http\Controllers\Api\MapController@store')->name('map.store');
Route::delete('/maps/{id}', 'App\Http\Controllers\Api\MapController@delete')->name('map.delete');
