<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Quetstion;
use App\User;

class Answer extends Model
{
	protected $table = 'answers';

	protected $fillable = [
        'answer', 'question_id', 'user_id',
    ];

    public function question() {
    	return $this->belongsTo(Question::class);
    }

    public function user() {
    	return $this->belongsTo(User::class);
    }
}
