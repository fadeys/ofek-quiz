<?php namespace App\Http\Controllers;

use App\Answer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Question;
use Illuminate\Http\Request;

class QuizController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$countAllQuestions = count(\Input::except('_token'));
		$countCorrectAnswers = 0;
		$results = [];
		foreach (\Input::except('_token') as $question => $answer) {
			$questionId = substr(strstr($question, '-'), 1);
			$question = Question::find($questionId);
			$correctAnswer = $question->isCorrectAnswer($answer);
			$result = [
				'question' => $question,
				'result' => $correctAnswer
			];
			if (!$correctAnswer) {
				$result['falseAnswer'] = Answer::find($answer);
				$result['trueAnswer'] = $question->getCorrectAnswer()[0];
			} else {
				$countCorrectAnswers++;
			}
			$results[] = $result;
		}
		$stats = [
			'numberOfQuestions' => $countAllQuestions,
			'numberOfCorrectAnswers' => $countCorrectAnswers,
			'percentage' =>  ($countCorrectAnswers / $countAllQuestions) * 100
		];
		return view('pages.summary', ['results' => $results, 'stats' => $stats]);
//		return $results;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
