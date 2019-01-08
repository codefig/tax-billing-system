<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class UserController extends Controller {
	//
	//
	public function __construct() {

	}

	public function home() {
		return view('home');
	}
}
