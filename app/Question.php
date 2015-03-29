<?php namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Question extends Model {

	protected $fillable = ['name', 'question'];

	public function getScrambledAnswers() {
		/** @var Collection $correctAnswer */
		$correctAnswer = $this->answers()->where('correct', '=', 1)->get();
		$otherAnswers = $this->answers()->where('correct', '=', 0)->limit(3)->get();
		$result = $correctAnswer->merge($otherAnswers);
		$result->shuffle();
		return($result);
	}

	public function answers() {
		return $this->hasMany('App\\Answer');
	}

	public function hasCorrectAnswer() {
		$answer = Answer::correctOfQuestion($this->id);
		return !$answer->isEmpty();
	}

	public function isCorrectAnswer($answerId) {
		$answer = $this->answers()->where('id', '=', $answerId)->first();
		if (!$answer) return false;
		return (boolean) $answer->correct;
	}

}
