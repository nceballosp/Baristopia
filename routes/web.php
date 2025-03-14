<?php

use Illuminate\Support\Facades\Route;

//Home
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');

//Product
Route::get('/product', 'App\Http\Controllers\ProductController@index')->name('product.index');
Route::get('/product/create', 'App\Http\Controllers\ProductController@create')->name('product.create');
Route::post('/product/save', 'App\Http\Controllers\ProductController@save')->name('product.save');
Route::get('/product/validate', 'App\Http\Controllers\ProductController@validate')->name('product.validation');
Route::get('/product/{id}', 'App\Http\Controllers\ProductController@show')->name('product.show');
Route::delete('/product/delete', "App\Http\Controllers\ProductController@delete")->name('product.delete');
