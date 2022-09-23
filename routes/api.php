<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('authors', \App\Http\Controllers\Api\AuthorController::class);
Route::apiResource('books', \App\Http\Controllers\Api\BookController::class);
Route::get('/getBooks', '\App\Http\Controllers\Api\BookController@index');
Route::get('/getAuthor', '\App\Http\Controllers\Api\AuthorController@index');
Route::post('/createAuthor', '\App\Http\Controllers\Api\AuthorController@store');
