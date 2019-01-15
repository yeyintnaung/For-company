<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class registerTwoController extends Controller
{
    //
    public function register_one_blade(){
        return view('auth.register_one');
    }
    public function register_one(Request $request){
      $validator=  Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'password' => 'required|min:6|confirmed',

        ]);
      if($validator->fails())
      {
          return redirect()->back()->withErrors($validator)->withInput();
      }
        return view('auth.register',
            [
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>$request->password,
                'confirm_password'=>$request->password_confirmation
            ]);
    }
}
