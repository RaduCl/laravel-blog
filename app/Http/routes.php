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

// Route model binding -> 'article' wildcard is binded to the Article with $slug
Route::bind('articles', function($slug)
{
    return App\Article::whereSlug($slug)->first();
});

Route::resource('articles', 'ArticlesController', ['except' => 'delete']);

Route::get('/', 'HomePageController@index');

Route::get('users/{id}', 'UsersController@show');
Route::get('admin/{id}', 'UsersController@admin');

//Route::get('articles/create', 'ArticlesController@create');

//Route::post('articles', 'ArticlesController@store');

//Route::post('articles/update', 'ArticlesController@update');

//  'articles/{slug}/edit' se pune dupa celelate rute care folosesc aceeasi cale
//Route::get('articles/{article}', 'ArticlesController@show');

//Route::get('articles/{article}/edit', 'ArticlesController@edit');


Route::get('/articles/delete/{id}', 'ArticlesController@destroy');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
