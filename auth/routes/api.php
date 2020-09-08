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

Auth::routes();

Route::prefix('product')->group(function(){
    
    Route::get('/index', ['as' => 'product.index','uses'=> 'ProductsController@index']);
    Route::post('/add', ['as' => 'product.addItem','uses'=> 'ProductsController@addItem']);
    Route::get('/show/{id}', ['as' => 'product.show','uses'=> 'ProductsController@show']);
    Route::get('/del/{id}', ['as' => 'product.deleteProduct','uses'=> 'ProductsController@deleteProduct']);
    Route::get('/edit/{id}', ['as' => 'product.edit','uses'=> 'ProductsController@edit']);
    Route::post('/upd/{id}', ['as' => 'product.updateProduct','uses'=> 'ProductsController@updateProduct']);

});

Route::prefix('auth')->group(function(){
    
    // Route::get('/home', ['as' => 'auth.home', 'uses' => 'AuthController@index']);
    Route::get('/users', ['as' => 'users.index', 'uses' => 'UsersController@index']);
    Route::post('/log', ['as' => 'auth.login', 'uses' => 'AuthController@login']);
   
});
