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

Route::get('products','ProductsController@index');
Route::get('product/create','ProductsController@create');
Route::get('product/show/{id}','ProductsController@show');
Route::get('product/edit/{id}','ProductsController@edit');
Route::post('product/store','ProductsController@store');
Route::post('products/search', 'ProductsController@search');
Route::put('product/update/{id}','ProductsController@update');
Route::delete('product/destroy/{id}','ProductsController@destroy');
