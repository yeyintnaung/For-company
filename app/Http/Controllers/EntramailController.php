<?php

namespace App\Http\Controllers;

use App\BplanMail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class EntramailController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
                $this->middleware('block');


    }


    public function see_all_mails()
    {
        if (empty(Input::get('date')))
        {
            $month = Carbon::now()->month;
            $year = Carbon::now()->year;
        }
        else
        {
            $month = Carbon::parse(Input::get('date'))->month;
            $year = Carbon::parse(Input::get('date'))->year;
        }

        $bmail = BplanMail::where(function ($query) {
            $query->where([['from_user', '=', Auth::user()->id], ['from_type','=','c'],['to_user','!=',Auth::user()->id]])
                ->orWhere([['from_user','!=',Auth::user()->id],['to_user', '=', Auth::user()->id],['to_type','=','c']])
                ->orWhere([['from_user', '=', Auth::user()->id],['from_type','=','ic'],['to_user','!=',Auth::user()->id]])
                ->orWhere([['from_user','!=',Auth::user()->id],['to_user', '=', Auth::user()->id],['to_type','=','ic']]);
        })->withinMonth($month, $year);

        return view('user.entra.mails.all_mails', ['data' => $bmail]);

    }

    public function send_mails()
    {
        if (empty(Input::get('date'))) {
            $month = Carbon::now()->month;
            $year = Carbon::now()->year;

        } else {
            $month = Carbon::parse(Input::get('date'))->month;
            $year = Carbon::parse(Input::get('date'))->year;
        }

        $bmail = BplanMail::where([['from_user','=', Auth::user()->id],['from_type','=','c']])->orWhere([['from_user','=', Auth::user()->id],['from_type','=','ic']])->withinMonth($month, $year);
        return view('user.entra.mails.all_mails', ['data' => $bmail]);
    }

    public function received_mails()
    {
        if (empty(Input::get('date'))) {
            $month = Carbon::now()->month;
            $year = Carbon::now()->year;

        } else {
            $month = Carbon::parse(Input::get('date'))->month;
            $year = Carbon::parse(Input::get('date'))->year;
        }

        $bmail = BplanMail::where([['to_user','=', Auth::user()->id],['to_type','=','c']])->orWhere([['to_user','=', Auth::user()->id],['to_type','=','ic']])->withinMonth($month, $year);
        return view('user.entra.mails.all_mails', ['data' => $bmail]);
    }
    public function view_mails($id)
    {
        $data = BplanMail::where('id', $id)->first();
        if (($data->from_user != Auth::user()->id) and ($data->to_user != Auth::user()->id)) {
            return 'not-allow';
        }
        BplanMail::where('id', $id)->update(['status' => 'read']);

        return view('user.entra.mails.mail_view', ['data' => $data]);

    }
}
