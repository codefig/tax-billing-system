<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller {

	//this Controller is for Unauthenticated Users;

	public function __construct() {
		$this->middleware('guest');
	}

	public function login(Request $request) {
		return view('login');
	}

	public function index(Request $request) {
		return view('welcome');
	}

	public function showSignup() {
		return view('signup');
	}

	public function signupSubmit(Request $request) {
		return $request->all();
	}

	public function loginSubmit(Request $request) {
		// return "this is the login function ";
		return $request->all();
	}
}
