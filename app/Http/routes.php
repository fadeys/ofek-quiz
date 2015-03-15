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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::resource('admin/questions', 'QuestionsController');
Route::resource('admin/answers', 'AnswersController', ['only' => ['edit', 'update', 'destroy', 'store']]);
Route::get('admin/answers/create/{questionId}', ['as' => 'admin.answers.create', 'uses' => 'AnswersController@create']);