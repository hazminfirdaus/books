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




Route::get('/books', 'BookController@index')->name('books.index');

Route::get('/books/create', 'BookController@create');
Route::post('/books', 'BookController@store');

Route::get('/books/{book_id}/edit', 'BookController@edit');
Route::post('/books/{book_id}', 'BookController@update');

Route::post('/books/{book_id}/review', 'BookController@review')->name('books.review');

Route::get('/books/{book_id}', 'BookController@show');//->where('book_id', '[0-9]+')




// Route::get('/books/{book_id}/review/{review_id}', 'ReviewController@show'); // can take more than one parameters

Route::get('/publishers', 'PublisherController@index')->name('publishers.index');

Route::get('/publishers/create', 'PublisherController@create')->name('publishers.create');
Route::post('/publishers', 'PublisherController@store')->name('publishers.store');
Route::get('/publishers/{id}/edit', 'PublisherController@edit')->name('publishers.edit');
Route::put('/publishers/{id}', 'PublisherController@update')->name('publishers.update');

Route::get('/publishers/{publisher_id}', 'PublisherController@show')->name('publishers.show');



Route::get('/cart', 'CartController@index')->name('cart.index');

Route::post('/add-to-cart', 'CartController@add');



Route::get('/authors', 'AuthorController@index')->name('authors.index');

Route::delete('/reviews/{review_id}', 'ReviewController@delete')->name('reviews.delete')->middleware('can:delete_reviews');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home.index');



Route::get('/bookshop/create', 'BookshopController@create')->name('bookshops.create');
Route::post('/bookshops', 'BookshopController@store')->name('bookshops.store');

Route::get('/bookshops', 'BookshopController@index')->name('bookshops.index');
Route::get('/bookshops/{bookshop_id}', 'BookshopController@show')->name('bookshops.show');
