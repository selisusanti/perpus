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
Route::get('/delete/{id}','HomeController@destroy')->name('delete-data');
Route::post('/update/{id}','HomeController@update')->name('update-peminjaman');

Route::prefix('buku')->group(function () {
    Route::get('/', 'BookController@index');
    Route::get('/create',"BookController@create")->name('insert');
    Route::post('/save', "BookController@store")->name('store-buku');
    Route::get('/edit/{id}',"BookController@edit");
    Route::get('/delete/{id}','BookController@destroy')->name('destroy-buku');
    Route::post('/update/{id}', "BookController@update")->name('update-buku');
});


Route::prefix('peminjaman')->group(function () {
    Route::get('/', 'PeminjamanController@index');
    Route::get('/create',"PeminjamanController@create")->name('create-peminjaman');
    Route::post('/save', 'PeminjamanController@store')->name('store-peminjaman');
    Route::get('/edit/{id}',"PeminjamanController@edit");
});

