<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthloginController extends Controller
{
    public function checklogin()
    {
	   	if ( Auth::viaRemember()) {
	   		return redirect('/listuser');
	   	} else {
	   		return view('login');
	   	}
	   	
	     
	   
    }
}
