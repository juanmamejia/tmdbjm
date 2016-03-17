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

Route::get('/', 'HomeController@index');
Route::get('person/{id}', 'PersonController@showPerson');
Route::get('movie/{id}', 'MovieController@showMovie');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('testingSearch', 'SearchController@showResults');

Route::get('getdata', 'SearchController@showAutocomplete');

