<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\MessageBag;

class loginController extends Controller
{
    public function checklogin()
    {
      return view('login');
    }
  	public function postlogin( Request $request )
  	{
	  	$rules = [
    		'name' =>'required',
    		'password' => 'required|min:5'
	    ];
	    $messages = [
    		'required' => ':attribute là trường bắt buộc',
    		'password.min' => 'Mật khẩu phải chứa ít nhất 5 ký tự',
    	];
    	$validator = Validator::make($request->all(), $rules, $messages);

    	if ($validator->fails()) {
    		return redirect()->back()->withErrors($validator)->withInput();
    	} 
    	else{
    		$name     = $request->input('name');
    		$password = $request->input('password');
    		$remember = $request->has('remember') ? true:false; 

    		//kiểm tra mật khẩu và username có đúng ko
    		if (Auth::attempt(['ten' => $name, 'password' =>$password], true)) {
    			return redirect('/listuser');
    		}
    		else
    		{
    			$errors = new MessageBag(['errorlogin' => 'Username hoặc mật khẩu không đúng']);
          return redirect()->back()->withInput()->withErrors($errors); 
    		}
    	}
  	}
  	public function logout()
  	{
  		Auth::logout();
  		return redirect('/login');
  	}
  
    public function __construct()
    {
      $this->middleware('guest')->except('logout');
    }
}
