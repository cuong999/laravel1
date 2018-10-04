<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\userifmodel;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class listusercontroller extends Controller
{
   public function nameup()
   {  
      if (Auth::check()) {
         $nameshort = userifmodel::orderBy('ten','asc')->paginate(5);
         return view('/listuser', compact('nameshort'));
      } 
      else {
         return redirect('/login');
      }
   }      
   public function getinfouser($id)
   {
      $getinfo = userifmodel::find($id);
      return view('update', compact('getinfo'));
   }
   public function deleteuser($id)
   {
   		userifmodel::find($id)->delete();
   		return redirect('/listuser');
   }
   public function update(Request $request, $id)
   {
      $messages = [
            'required' => 'Trường :attribute bắt buộc nhập.',
            'email'    => 'Trường :attribute phải có định dạng email',
            'max'      => 'Đã quá số kí tự cho phép',
            'confirmed'=> 'password không trùng khớp nhau'
      ];
      $validator = Validator::make($request->all(), [
            'name'      => 'required|max:255',
            'email'     => 'required|email',
            'password'  => 'required|confirmed',
            'password_confirmation'=> 'required'
       ],$messages);
      if ($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
      }
      else{
         $update            = userifmodel::find($id);
         $update->gioitinh  = $request->sex;
         $update->ten       = $request->name;
         $update->email     = $request->email;
         $update->password  = bcrypt($request->password);
         $update->save();
         return redirect('/listuser');
      }
   }
}
