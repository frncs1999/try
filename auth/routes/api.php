<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', ['as' => 'users.index', 'uses' => 'UsersController@index']);
Route::get('/user', ['as' => 'user.index', 'uses' => 'UserController@index']);   //display users
Route::get('/prod', ['as' => 'products.index', 'uses' => 'ProductsController@index']);
Route::post('/add', ['as' => 'products.add', 'uses' => 'ProductsController@add']);
Route::get('/del/{id}', ['as' => 'products.delete', 'uses' => 'ProductsController@delete']);
Route::get('/edit/{id}', ['as' => 'products.edit', 'uses' => 'ProductsController@edit']);
Route::post('/upd/{id}', ['as' => 'products.update', 'uses' => 'ProductsController@update']);

Route::post('/login', ['as' => 'users.login', 'uses' => 'AuthController@login']);
Route::get('/auth', ['as' => 'users.auth', 'uses' => 'AuthController@authenticate']);