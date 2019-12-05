<?php

use Illuminate\Database\Seeder;
use App\Answer;
use Illuminate\Support\Facades\DB;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Answer::class, 400)
        ->create();
    }
}
