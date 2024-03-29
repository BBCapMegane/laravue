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

//Route::get('todo', 'TodoController@index');
Route::group(['prefix' => 'api'], function(){
    Route::get('todo', 'TodoController@index');
    Route::post('todo', 'TodoController@store');
    Route::delete('todo/{id}', 'TodoController@destroy');
});
