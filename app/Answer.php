<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model {

	protected $fillable = ['question_id', 'name', 'answer', 'explanation', 'correct'];

	public function question() {
		return $this->belongsTo('App\\Question');
	}

	public function scopeCorrectOfQuestion($query, $questionId) {
		return $query->where('correct', '=', 1)->where('question_id', '=', $questionId)->get();
	}

}
