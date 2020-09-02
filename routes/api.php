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

Route::post('/tennis-players/containers', 'TennisPlayer\ContainerController@run');
Route::get('/online-stores/products', 'OnlineStore\ProductController@index');
Route::get('/online-stores/orders', 'OnlineStore\OrderController@index');
Route::post('/online-stores/orders', 'OnlineStore\OrderController@create');
Route::post('/home-keys/finders', 'HomeKey\FinderController@run');
