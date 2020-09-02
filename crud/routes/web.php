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

//Route::get('/', function () {
//    return view('index');
//});


Route::get('/', ['as' => 'products.index', 'uses' => 'ProductsController@index']);
Route::post('/', ['as' => 'products.add', 'uses' => 'ProductsController@add']);
Route::get('/{id}', ['as' => 'products.delete', 'uses' => 'ProductsController@delete']);
Route::get('edit/{id}', ['as' => 'products.edit', 'uses' => 'ProductsController@edit']);
Route::post('edit/{id}', ['as' => 'products.update', 'uses' => 'ProductsController@update']);