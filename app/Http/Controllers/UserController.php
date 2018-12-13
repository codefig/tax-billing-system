<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    
    //this Controller is for Unauthenticated Users;

    public function __construct(){
        $this->middleware('guest');
    }


    public function login(Request $request){
        return view('login');
    }

    public function index(Request $request){
        return view('welcome');
    }
}
