<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('farmer/all', 'FarmerController@index_all');
Route::get('store/all', 'StoreController@index_all');

Route::resource('farmer', 'FarmerController');
Route::resource('store', 'StoreController');
Route::resource('event', 'EventController');
Route::resource('work', 'WorkController');
