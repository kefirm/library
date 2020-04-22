<?php

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

Route::post('/books', 'BooksController@store', ['_token' => csrf_token()]);
Route::patch('/books/{book}', 'BooksController@update', ['_token' => csrf_token()]);
Route::delete('/books/{book}', 'BooksController@destroy', ['_token' => csrf_token()]);

Route::post('authors', 'AuthorsController@store');

Route::post('/checkout/{book}', 'CheckoutBookController@store');
Route::post('/checkin/{book}', 'CheckinBookController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
