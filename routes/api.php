<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/recipe', 'App\Http\Controllers\Api\RecipeApiController@index')->name('api.recipe.index');
Route::get('/recipe/paginate', 'App\Http\Controllers\Api\RecipeApiController@paginate')->name('api.recipe.paginate');
