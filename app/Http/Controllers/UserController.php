<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {

	//this Controller is for Unauthenticated Users;
	public function __construct() {
		$this->middleware('guest');
	}

	public function login(Request $request) {
		return view('login');
	}

	public function loginSubmit(Request $request) {
		// return "welcome to the login function";
		$this->validate($request, [
			'plate_no' => 'required',
			'password' => 'required',
		]);

		if (Auth::attempt(['plate_no' => $request->plate_no, 'password' => $request->password])) {
			return redirect()->route('user.home');
		}
		return redirect()->back();
	}

	public function index(Request $request) {
		return view('welcome');
	}

	public function showSignup() {
		return view('signup');
	}

	public function signupSubmit(Request $request) {
		$this->validate($request, [
			'plate_no' => 'required|unique:users,plate_no',
			'drivers_name' => 'required',
			'password' => 'required',
			'is_updated' => 0,
		]);

		$user = new User();
		$user->plate_no = $request->plate_no;
		$user->drivers_name = $request->drivers_name;
		$user->password = Hash::make($request->password);
		$user->save();

		Auth::login($user);
		return redirect()->route('user.home');

	}
}
