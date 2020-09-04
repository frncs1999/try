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

//Route::get('/user', ['as' => 'user.index', 'uses' => 'UserController@index']);

Route::prefix('product')->group(function(){
    
    Route::get('/prod', ['as' => 'products.index', 'uses' => 'ProductsController@index']);
    Route::post('/add', ['as' => 'products.add', 'uses' => 'ProductsController@add']);
    Route::get('/del/{id}', ['as' => 'products.delete', 'uses' => 'ProductsController@delete']);
    Route::get('/edit/{id}', ['as' => 'products.edit', 'uses' => 'ProductsController@edit']);
    Route::post('/upd/{id}', ['as' => 'products.update', 'uses' => 'ProductsController@update']);

});

Route::prefix('auth')->group(function(){
    
    Route::get('/home', ['as' => 'auth.home', 'uses' => 'AuthController@index']);
    Route::get('/users', ['as' => 'users.index', 'uses' => 'UsersController@index']);
    Route::post('/login', ['as' => 'auth.login', 'uses' => 'AuthController@login']);
    Route::get('/author', ['as' => 'auth.auth', 'uses' => 'AuthController@authenticate']);
   
});
