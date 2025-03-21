<?php

use Illuminate\Support\Facades\Route;

//Home
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');

//Product
Route::get('/product', 'App\Http\Controllers\ProductController@index')->name('product.index');
Route::get('/product/create', 'App\Http\Controllers\ProductController@create')->name('product.create');
Route::post('/product/save', 'App\Http\Controllers\ProductController@save')->name('product.save');
Route::get('/product/{id}', 'App\Http\Controllers\ProductController@show')->name('product.show');
Route::delete('/product/delete', "App\Http\Controllers\ProductController@delete")->name('product.delete');

//Recipe
Route::get('/recipe', 'App\Http\Controllers\RecipeController@index')->name('recipe.index');
Route::get('/recipe/create', 'App\Http\Controllers\RecipeController@create')->name('recipe.create');
Route::post('/recipe/save', 'App\Http\Controllers\RecipeController@save')->name('recipe.save');
Route::get('/recipe/{id}', 'App\Http\Controllers\RecipeController@show')->name('recipe.show');
Route::delete('/recipe/delete', "App\Http\Controllers\RecipeController@delete")->name('recipe.delete');

//Payment
Route::get('/payment', 'App\Http\Controllers\PaymentController@index')->name('payment.index');
Route::get('/payment/create', 'App\Http\Controllers\PaymentController@create')->name('payment.create');
Route::post('/payment/save', 'App\Http\Controllers\PaymentController@save')->name('payment.save');
Route::get('/payment/{id}', 'App\Http\Controllers\PaymentController@show')->name('payment.show');
Route::delete('/payment/delete', "App\Http\Controllers\PaymentController@delete")->name('payment.delete');

//Cart
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name("cart.index");
Route::get('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name("cart.add");
Route::get('/cart/removeAll/', 'App\Http\Controllers\CartController@removeAll')->name("cart.removeAll");

Auth::routes();