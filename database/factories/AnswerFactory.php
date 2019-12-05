<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Answer;
use App\Question;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Answer::class, function (Faker $faker) {

	$user = User::all()->random();
	$question = Question::all()->random();

    return [
        'answer' => $faker->text($maxNbChars = 200),
        'user_id' => $user->id,
        'question_id' => $question->id
    ];
});
