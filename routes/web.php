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

Auth::routes();

Route::get('/', 'PriceController@index');
Route::get('/price', 'PriceController@index');

Route::post('/price', 'PriceController@store');
Route::get('/price/add', 'PriceController@add');

Route::get('/price/edit/{price}', 'PriceController@edit');
Route::post('/price/update', 'PriceController@update');

Route::delete('/price/{price}', 'PriceController@destroy');