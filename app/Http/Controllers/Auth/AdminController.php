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
        return view('admin.adddriver');
    }

    public function updateDriver(Request $request){
        return view('admin.updatedriver');
    }

    public function showPayments(){
        return view('admin.payments');
    }

    public function showPaymentHistory(){
        return view('admin.payment-history');
    }
}
