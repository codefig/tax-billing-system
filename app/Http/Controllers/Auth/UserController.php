<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class UserController extends Controller {
	//
	//
	public function __construct() {
		$this->middleware('auth');
	}

	public function home() {
		return view('home');
	}

	public function logout() {
		Auth::logout();
		return redirect()->route('index');
	}
}
