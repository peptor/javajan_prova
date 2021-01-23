<?php

use Illuminate\Http\Request;

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

//Route::resource('element', 'ElementoController');
Route::resource('element', 'ElementController');
Route::post('element/{id}/changeImage', 'ElementController@changeImage');
Route::get('element/esborrarImatge/{id}', 'ElementController@esborrarImatge');
Route::get('inici', 'IniciController@llista');


