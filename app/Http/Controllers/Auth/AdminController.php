<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //
    //
    public function __construct(){
    	//echo "this is the amdin "
    }


    public function showHome(){
    	echo "This is the admin home";
    }
}
