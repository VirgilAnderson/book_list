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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/books/swap/swap', 'BookController@swap')->middleware('auth');
Route::resource('books', 'BookController',['except' => ['index']])->middleware('auth');
Route::get('/books/{sorted?}/{sort?}/{dir?}', ['as' => 'books.index', 'uses' => 'BookController@index'])->middleware('auth');
