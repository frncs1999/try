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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/users', ['as' => 'users.index', 'uses' => 'UsersController@index']);
// Route::get('/user', ['as' => 'user.index', 'uses' => 'UserController@index']);   //display users
// Route::get('/prod', ['as' => 'products.index', 'uses' => 'ProductsController@index']);
// Route::post('/add', ['as' => 'products.add', 'uses' => 'ProductsController@add']);
// Route::get('/del/{id}', ['as' => 'products.delete', 'uses' => 'ProductsController@delete']);
// Route::get('/edit/{id}', ['as' => 'products.edit', 'uses' => 'ProductsController@edit']);
// Route::post('/upd/{id}', ['as' => 'products.update', 'uses' => 'ProductsController@update']);

// Route::post('/login', ['as' => 'users.login', 'uses' => 'AuthController@login']);
// Route::get('/auth', ['as' => 'users.auth', 'uses' => 'AuthController@authenticate']);

Route::post('/try', ['as' => 'auth.login', 'uses' => 'AuthController@login']);