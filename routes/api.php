<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/recipes', 'App\Http\Controllers\Api\RecipeApiController@index')->name('api.recipe.index');
Route::get('/recipes/paginate', 'App\Http\Controllers\Api\RecipeApiController@paginate')->name('api.recipe.paginate');

