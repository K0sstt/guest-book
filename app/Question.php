<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Answer;

class Question extends Model
{
	protected $table = 'questions';

	protected $fillable = [
        'question', 'user_id',
    ];

    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function answers() {
    	return $this->hasMany(Answer::class);
    }
}
