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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/api/events', 'HomeController@get');

Route::get('/event/{id}', 'EventDateController@edit');
Route::post('/event/{id}', 'EventDateController@update');

Route::get('/myevents', 'EventController@index')->name('myevents');

Route::get('/newplayer', 'PlayerController@create');
Route::post('/newplayer', 'PlayerController@store');
