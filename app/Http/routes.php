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
Route::get('movie/imageajax/{imagePath}', 'MovieController@showAjaxImage');
Route::get('tv/imageajax/{imagePath}', 'TvController@showAjaxImage');
Route::get('tv/{id}', 'TvController@showTv');

Route::get('search', ['as' => 'search', 'uses' => 'SearchController@showResults']);
Route::get('search/{term}/{page}', 'SearchController@showResults');
Route::get('search-ajax/{term}/{page}', 'SearchController@showAjaxPageResults');

Route::get('getdata', 'SearchController@showAutocomplete');

Route::get('user/setAdultOption', 'UserController@adultSetting');

