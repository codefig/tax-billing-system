<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Http\Request;

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

	public function showProfile() {

		$user = Auth::user();
		return view('profile', compact('user'));
	}

	public function updateProfile(Request $request) {
		return "this is the update profile information";
	}
}
