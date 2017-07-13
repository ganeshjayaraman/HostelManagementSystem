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

Route::group(['middleware' => ['web']], function () {

Route::get('/', function () {
    return view('welcome');
});

Route::get('settings', function(){
	return view("auth/passwords/reset");
});

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', function(){
	Auth::logout();
	return Redirect()->to('/');
});

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('password/reset/{token?}', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@showResetForm']);
Route::post('password/email', ['as' => 'auth.password.email', 'uses' => 'Auth\PasswordController@sendResetLinkEmail']);
Route::post('password/reset', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@reset']);

// admin register
Route::get('adminregister', 'Auth\AuthController@admingetRegister');
Route::post('adminregister', 'Auth\AuthController@adminpostRegister');
Route::get('adminlogin', 'Auth\AuthController@admingetLogin');
Route::post('adminlogin', 'Auth\AuthController@adminpostLogin');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/json', 'HomeController@getjson');

Route::get('/room_allotment', 'HomeController@room_allotment');
Route::get('/mess_allotment', 'HomeController@mess_allotment');
Route::get('/room_allocate', 'HomeController@room_allocate');
Route::get('/get_room_allocation', 'HomeController@get_room_allocation');
Route::post('/sortable', 'HomeController@get_sorted_order');

});
