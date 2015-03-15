<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {

	protected $fillable = ['name', 'question'];

	public function answers() {
		return $this->hasMany('App\\Answer');
	}

	public function hasCorrectAnswer() {
		$answer = Answer::correctOfQuestion($this->id);
		return !$answer->isEmpty();
	}

}
