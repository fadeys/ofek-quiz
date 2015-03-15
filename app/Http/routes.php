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


Route::get('/', 'QuestionsController@index');
Route::get('/test', function() {
	$questions = App\Question::all();
	return view('pages.quiz', ['questions' => $questions]);
});

Route::get('home', 'QuestionsController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::resource('admin/questions', 'QuestionsController');
Route::resource('admin/answers', 'AnswersController', ['only' => ['edit', 'update', 'destroy', 'store']]);
Route::get('admin/answers/create/{questionId}', ['as' => 'admin.answers.create', 'uses' => 'AnswersController@create']);