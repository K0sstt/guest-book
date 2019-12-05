<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Question;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Question::class, function (Faker $faker) {
	$user = User::all()->random();

    return [
        'question' => $faker->text($maxNbChars = 150),
        'user_id' => $user->id
    ];
});
