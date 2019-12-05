<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Question;
use App\User;
use App\Answer;

class HomeController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index()
	{
		
		$questions = Question::paginate(15);
		$user = Auth::user();

		return view('home', ['questions' => $questions, 'user' => $user]);
	}

	public function store(Request $request) {

		if(!empty($request->input('question'))) {
			$question = new Question;
			$question->question = $request->input('question');
			$question->user_id = Auth::id();
			$question->save();
		} elseif(!empty($request->input('comment'))) {
			$question = Question::find($request->input('questionID'))->first();
			$answer = [
				'answer' => $request->input('comment'), 
				'question_id' => $request->input('questionID'), 
				'user_id' => Auth::id()
			];

			$answer = new Answer($answer);

			$question->answers()->save($answer);
		}
		

		return redirect()->route('home.index');
	}

	public function getBan(Request $request) {
		$user = User::find($request->input('id'));
		$user->isBan = 1;
		$user->save();

		return redirect()->route('home.index');
	}

	public function delete($id) {
		Answer::find($id)->delete();

		return redirect()->route('home.index');
	}

}
