<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http;
use Auth;

class AdminController extends Controller
{

    public function __construct(){
        // return "welcome to the admin controller";
        $this->middleware('guest:admin');
    }

    public function showLogin(Request $request){
        return view('admin.login');
    }

    public function loginSubmit(Request $request){
        // return "this is the login submit function ";
        $this->validate($request, [
            'email' => 'required|email', 
            'password' => 'required',
        ]);

        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('admin.home');
        }
        else{
            return redirect()->back()->withInput();
        }
    }
}
