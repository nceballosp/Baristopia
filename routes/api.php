<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MapController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/maps', 'App\Http\Controllers\Api\MapController@index')->name('api.map.index');
Route::get('/maps/{id}', 'App\Http\Controllers\Api\MapController@show')->name('api.map.show');
Route::post('/maps', 'App\Http\Controllers\Api\MapController@store')->name('api.map.store');
Route::delete('/maps/{id}', 'App\Http\Controllers\Api\MapController@delete')->name('api.map.delete'); 