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

Route::get('/', 'FundingSourceController@CTRindex');

Route::model('countries', 'Country');
Route::get('countries','CountriesController@index');
Route::bind('countries', function($value, $route) {
    return App\Country::whereSlug($value)->first();
});
Route::resource('countries', 'CountriesController');

Route::model('projects', 'Project');
Route::get('projects','ProjectsController@index');
Route::bind('projects', function($value, $route) {
    return App\Project::whereSlug($value)->first();
});

Route::get('region','ProjectsController@region');

Route::resource('projects.countryproject','CountryProjectController');
Route::resource('projects', 'ProjectsController');

Route::model('funding_sources','FundingSource');
Route::bind('funding_sources', function($value, $route){
    return App\FundingSource::whereSlug($value)->first();
});
Route::resource('funding_sources','FundingSourceController');

Route::model('impromptu','Impromptu');
Route::get('impromptu','ImpromptuController@create');
Route::resource('impromptu','ImpromptuController');

Route::model('watson','Watson');
Route::get('watson','WatsonController@create');
Route::resource('watson','WatsonController');

Route::resource('watson_country',"WatsonCountryController");

Route::model('short_award_numbers','ShortAwardNumber');
Route::resource('short_award_numbers',"ShortAwardNumberController");

Route::resource('projects.short_award_numbers','ShortAwardNumberController');


Route::resource('projects.fundingsourceproject','FundingSourceProjectController');

Route::get('home', 'FundingSourceController@CTRindex');

/*Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);*/

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::group(['middleware' => 'auth','uses'], function()
{
    Route::resource('countries', 'CountriesController', ['except' => ['index','show']]);
    Route::resource('projects', 'ProjectsController', ['except' => ['index','show','region']]);
    Route::resource('funding_sources', 'FundingSourceController', ['except' => ['index','show','CTRindex']]);
    Route::resource('watson', 'WatsonController', ['except' => ['index','show']]);
    Route::resource('impromptu', 'ImpromptuController', ['except' => ['index','show']]);
});