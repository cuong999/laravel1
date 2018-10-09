<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\userifmodel;
use Illuminate\Support\Facades\Hash;
use Validator;



class createuser extends Controller
{
   	public function storeus(Request $request)
   	{
   		$messages = [
            'required' => 'Trường :attribute bắt buộc nhập.',
            'email'    => 'Trường :attribute phải có định dạng email',
            'max'      => 'Đã quá số kí tự cho phép'
        ];

	  	$validator = Validator::make($request->all(), [
            'name'      => 'required|max:255',
            'email'     => 'required|email',
            'password'  => 'required',
	    ],$messages);
	    if ($validator->fails()) {
	    	 return redirect('/dangky')->withErrors($validator)->withInput();
	    }
	    else

	    {
	    	$userinfo            = new userifmodel();
	    	$userinfo->gioitinh  = $request->sex;
	    	$userinfo->ten       = $request->name;
	    	$userinfo->email     = $request->email;
	    	$userinfo->password  = bcrypt($request->password);
	    	$userinfo->save();	
	    	return redirect('/listuser');
	    }
	}    
}
