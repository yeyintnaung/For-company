<?php

namespace App\Http\Controllers;

use Validator;
use App\User;

use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class ChangepasswordController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
                $this->middleware('block');

        $this->middleware('type');
        $this->middleware('guest');
    }

    public function detail($id)
    {
        if($id != Auth::user()->id){
            return 'error';                     ;
        }
        $data=User::where('id',$id)->first();
        return view('user.entra.profile_detail',['data'=>$data]);
    }

    public function change($id, Request $request)
    {
        if($id != Auth::user()->id){
            return 'error';
        }

        $data = User::where('id', $id)->first();
    	$validator=  Validator::make($request->all(), [
            'current_password' => 'required|min:6',
            'password' => 'required|min:6',
            'password_confirm' => 'required|min:6',

        ]);
    	
    	if($validator->fails())
		{
            if(preg_match('/inves_profile/',$request->url())){
                return redirect('inves_profile/profile_detail/'.$id.'#change')->withErrors($validator);


            }else {
                return redirect('entra/profile_detail/' . $id . '#change')->withErrors($validator);
            }

		}

		elseif(Input::get('password') != Input::get('password_confirm'))
		{
            if(preg_match('/inves_profile/',$request->url())){
                return redirect('inves_profile/profile_detail/'.$id.'#change')->with('error', 'New password and Confirm password do not match!');


            }
            else{
                return redirect('entra/profile_detail/'.$id.'#change')->with('error', 'New password and Confirm password do not match!');

            }   
            return redirect('entra/profile_detail/'.$id.'#change')->with('error', 'New password and Confirm password do not match!');

        }
    	
    	elseif(Hash::check(Input::get('current_password'), $data['password']) && Input::get('password') == Input::get('password_confirm'))
    	{
            $data->password = bcrypt(Input::get('password'));

            $data->save();
            if(preg_match('/inves_profile/',$request->url())){
                return redirect('inves_profile/profile_detail/'.$id)->with('success', 'Your password has been changed.');

            }
            return redirect('entra/profile_detail/'.$id)->with('success', 'Your password has been changed.');
    	}
    	else{
            if(preg_match('/inves_profile/',$request->url())){
                return redirect('inves_profile/profile_detail/'.$id.'#change')->with('error', 'Your current password does not match');


            }
            else{
                return redirect('entra/profile_detail/'.$id.'#change')->with('error', 'Your current password does not match');

            }
        }

    }
}
