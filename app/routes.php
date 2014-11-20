<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*Route::get('/', function()
{
	return View::make('hello');
});
*/


Route::get('/', 'RegisterController@getIndex');
Route::post('/post/register_baru', 'RegisterController@postBaru');
Route::get('/peserta', 'RegisterController@getPeserta');
Route::get('/daftar_ulang', 'RegisterController@getPendaftar');
Route::get('/check', 'RegisterController@checkSoldid');
