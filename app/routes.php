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

Route::get('/', function()
{
	return View::make('home');
});

Route::any('signup', 'SignUpController@register');

Route::any('login', 'LoginController@login');

Route::get('logout', function(){
	Auth::logout();
	return View::make('logout');
});


Route::group(['before' => 'auth'], function()
{
	Route::get('profile/{user}', ['as' => 'profile.show', 'uses' => 'UserController@showUserProfile']);

	Route::get('profile/{user}/edit/locations', ['as' => 'profile.editLocations', function()
	{
		return View::make('mylocations');
	}]);

	Route::get('select-city', ['as' => 'select.city', 'uses' => 'CityController@selectCity']);

	Route::get('fetch-cities', ['as' => 'fetch.cities', 'uses' => 'CityController@fetchUserCities']);

	Route::any('save-cities', ['as' => 'save.cities', 'uses' => 'CityController@createCityUserRelation']);
});