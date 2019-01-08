<?php

namespace App\Http\Controllers;

use App\User;
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
		$this->validate($request, [
			'plate_no' => 'required',
			'drivers_name' => 'required',
			'password' => 'required',
		]);

		$user = new User();
		$user->plate_no = $request->plate_no;
		$user->drivers_name = $request->drivers_name;
		$user->password = $request->password;
		$user->save();

	}

	public function loginSubmit(Request $request) {
		// return "this is the login function ";
		return $request->all();
	}
}
