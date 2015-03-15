<?php namespace App\Http\Controllers;

use App\Answer;
use App\Http\Requests;

use App\Question;
use Illuminate\Http\Request;

class AnswersController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	public function create($questionId) {
		$question = Question::find($questionId)->load('answers');
		return view('admin.answers.create', ['question' => $question]);
	}

	public function store() {
		Answer::create(\Input::all());
		return \Redirect::back();
	}

	public function edit($id) {
		$answer = Answer::find($id)->load('question');
		return view('admin.answers.edit', ['answer' => $answer]);
	}

	public function update($id) {
		Answer::find($id)->update(\Input::all());
		$answer = Answer::find($id);

		return \Redirect::route('admin.answers.create', ['questionId' => $answer->question_id]);
	}

	public function destroy($id) {
		Answer::destroy($id);
		return \Redirect::back();
	}

}
