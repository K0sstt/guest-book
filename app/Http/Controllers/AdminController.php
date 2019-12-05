<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;

class AdminController extends Controller
{
	public function getBan($id) {

		return redirect()->route('home.index');
	}

	public function delete($id) {
		Answer::find($id)->delete();

		return redirect()->route('home.index');
	}
}
