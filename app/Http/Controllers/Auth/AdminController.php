<?php

namespace App\Http\Controllers\Auth;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //
    //
    public function __construct(){
        $this->middleware('auth:admin');
        
    }

    public function index(){
        return "this is the index url ";
    }
    public function showHome(){
        // echo "This is the admin home";
        return view('admin.index');
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('admin.login');
    }

    public function showAddDriver(Request $request){
        return "this is the show Add dreiver";
    }

    public function showPayments(){
        return "this is the show paymenst function";
    }

    public function showPaymentHistory(){
        return "this isthe payment history page";
    }
}
