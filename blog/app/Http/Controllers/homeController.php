<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\userifmodel;


class homeController extends Controller
{	
	public function __construct() {
    	$this->middleware('auth');
    }

    public function getIndex() {
    	
		$listuser = userifmodel::orderBy('id','desc')->paginate(5);
		return view('listuser', compact('listuser'));
    	
    }
}
