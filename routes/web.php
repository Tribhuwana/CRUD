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

Route::get('/','CrudBrgController@index' );

Route::resource('/barang', 'CrudBrgController');
Route::post('/satuan', 'CrudBrgController@storesatuan')->name('store_satuan');