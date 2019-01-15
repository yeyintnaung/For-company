<?php

namespace App\Http\Controllers;

use App\Company;
use App\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
                $this->middleware('block');

    }

    public function rate(Request $request)
    {
        $check = Rating::where('from_user', $request->from_user)->first()->from_user;

        $com = Company::where('id', $request->com_id)->first()->id;

        if ($check && $com)
        {
            return redirect()->back()->with("You had been rated this company! Thank you for your rating.");
        }

        if(Auth::user()->id != $request->from_user)
        {
            return redirect()->back()->with('Not Allow!');
        }

        Rating::create([
            'rate' => "1",
            'from_user' => $request->from_user,
            'com_id' => $request->com_id,
        ]);
    }
}
