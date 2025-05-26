<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MapController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/maps', 'App\Http\Controllers\Api\MapController@index')->name('api.map.index');
Route::get('/maps/{id}', 'App\Http\Controllers\Api\MapController@show')->name('api.map.show');
Route::post('/maps', 'App\Http\Controllers\Api\MapController@store')->name('api.map.store');
Route::delete('/maps/{id}', 'App\Http\Controllers\Api\MapController@delete')->name('api.map.delete'); 


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/recipes', 'App\Http\Controllers\Api\RecipeApiController@index')->name('api.recipe.index');
Route::get('/recipes/paginate', 'App\Http\Controllers\Api\RecipeApiController@paginate')->name('api.recipe.paginate');

