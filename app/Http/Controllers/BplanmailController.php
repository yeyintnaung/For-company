<?php

namespace App\Http\Controllers;

use App\BplanMail;
use App\Bussinessplan;
use App\Company;
use App\Invest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BplanmailController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('block');


    }

// =====================================================================================================================

    public function send_mail_from_inves_form($bplan_id)
    {
        $plan_data = Bussinessplan::where('id', $bplan_id)->first();
        $com = Company::where('id', $plan_data->company_id)->first();

        return view('Bmails.send_message_for_business', ['plan_data' => $plan_data, 'com' => $com]);
    }

// =====================================================================================================================

    public function reply_mail_from_entra_form($msg_id)
    {
         $msg=BplanMail::where('id',$msg_id)->first();
        $plan_data = Bussinessplan::where('id', $msg->business_plan_id)->first();
        $check_com=Company::where('id',$plan_data->company_id)->first();
        if($check_com->user_id != Auth::user()->id){
            return 'not_allow';
        }
        $inves = Invest::where('user_id', $msg->from_user)->first();

        return view('Bmails.reply_message_for_entra', ['plan_data' => $plan_data, 'inves' => $inves,'msg_id'=>$msg_id]);
    }

// =====================================================================================================================

    public function reply_mail_from_entra($msg_id,Request $request)
    {
        if ((Auth::user()->id != $request->from_user) and (Auth::user()->type == 2)) {
            return 'not allow';
        }
        $com_check = Invest::where('user_id', $request->to_user)->count();
        if ($com_check == 0) {
            return 'not allow';
        }
        $to_type=User::where('id',$request->to_user)->first();
        if($to_type->type != 2){
            return 'not_allow';
        }
        $msg=BplanMail::where('id',$msg_id)->first();
        if($msg->from_user != $request->to_user){
            return 'not_allow';
        }
        $input = $request->all();
        $input['status'] = 'unread';
        $input['soft_del'] = 'no';
        $input['from_type'] = 'c';
        $input['to_type'] = 'i';
        $input['business_plan_id'] = $msg->business_plan_id;
        BplanMail::create($input);
        Session::flash('email', 'send');
        return redirect()->back();
    }

// =====================================================================================================================

    public function send_mail_from_inves($bplan_id, Request $request)
    {
        if (Auth::user()->id != $request->from_user) {
            return 'not allow';
        }
        $com_check = Company::where('user_id', $request->to_user)->count();
        if ($com_check == 0) {
            return 'not allow';
        }
        $com_data = Company::where('user_id', $request->to_user)->first();


        $plan_check = Bussinessplan::where([['id', '=', $bplan_id], ['company_id', '=', $com_data->id]])->count();


        if ($plan_check == 0) {
            return 'not allow';
        }
        $plan_data = Bussinessplan::where([['id', '=', $bplan_id], ['company_id', '=', $com_data->user_id]])->first();
        $inves_check = Invest::where('user_id', $request->to_user)->count();
        if($inves_check != 0){
            $totype='ic';
        }else{
            $totype='c';
        }


        $input = $request->all();
        $input['status'] = 'unread';
        $input['soft_del'] = 'no';
        $input['from_type'] = 'i';
        $input['to_type'] = $totype;
        $input['business_plan_id'] = $bplan_id;

        BplanMail::create($input);
        Session::flash('email', 'send');
        return redirect()->back();
    }

}
