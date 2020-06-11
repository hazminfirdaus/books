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

Route::get('/', function () {
    return view('welcome');
});

//            URL       controller's name @ function (unique)
Route::get('/api/books', 'ApiBookController@index');

Route::get('/hello', 'HelloController@index');



Route::get('/books', 'BookController@index');

Route::get('/books/create', 'BookController@create');
Route::post('/books', 'BookController@store');

Route::get('/books/{book_id}/edit', 'BookController@edit');
Route::post('/books/{book_id}', 'BookController@update');

Route::get('/books/{book_id}', 'BookController@show');//->where('book_id', '[0-9]+')



// Route::get('/books/{book_id}/review/{review_id}', 'ReviewController@show'); // can take more than one parameters

Route::get('/publishers', 'PublisherController@index');

Route::get('/publishers/{publisher_id}', 'PublisherController@show');



Route::get('/cart', 'CartController@index');

Route::post('/add-to-cart', 'CartController@add');