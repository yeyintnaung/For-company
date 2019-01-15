<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssoUserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('asso_type');
    }
    public function user_profile(){
        $data=User::where('id',Auth::user()->id)->first();
        return view('user.asso.user_profile.userprofile',['data'=>$data]);
    }
}
