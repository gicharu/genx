<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', '\App\Http\Controllers\AuthorsController@index');

Route::resources([
    'authors' => \App\Http\Controllers\AuthorsController::class,
    'books' => \App\Http\Controllers\BooksController::class
]);
Route::get('authors/{author}/destroy', '\App\Http\Controllers\AuthorsController@destroy');
Route::get('books/{book}/destroy', '\App\Http\Controllers\BooksController@destroy');
