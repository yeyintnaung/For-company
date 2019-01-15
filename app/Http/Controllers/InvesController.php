<?php

namespace App\Http\Controllers;

use App\Acitivity;
use App\AssoModel;
use App\Bussinessplan;
use App\Company;
use App\Events;
use App\Invest;
use App\Message;
use App\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class InvesController extends Controller
{
    //
    public function __construct()
    {

        $this->middleware('auth');
                $this->middleware('block');

        $this->middleware('investype', ['except' => ['invest_require_form', 'invest_require', 'inves_req_detail']]);
        $this->middleware('Plans',['except'=>['invest_require_form', 'invest_require', 'inves_req_detail']]);


    }

    public function index()
    {

    }
    public function business_proposals()
    {
        return view('user.inves.business_proposals');


    }

    public function business_plan_detail($id)
    {
        $detail = Bussinessplan::where('id', $id)->first();
        $com = Company::where('id', $detail->company_id)->first();
        return view('user.inves.business_plan_detail', ['data' => $detail, 'com' => $com]);

    }
    public function send_msg(Request $request)
    {
        $data=Message::where([['from_user','=',Auth::user()->id],['soft_del','=','no'],['from_type','=','i']])->orderBy('created_at','desc')->get();
       return view('user.inves.sending_mail',['data'=>$data]);

    }
    public function received_msg(Request $request)
    {
        $data=Message::where([['to_user','=',Auth::user()->id],['soft_del','=','no'],['to_type','=','i']])->orderBy('created_at','desc')->get();
        return view('user.inves.received_msg',['data'=>$data]);

    }
    public function send_msg_delete($id)
    {
        $data=Message::where('id',$id)->first();

        if(Auth::user()->id == $data->from_user ) {
            if (Message::where('id', $id)->update(['soft_del' => 'yes'])){
                Session::flash('msg_delete','Your msg was successfully deleted');
                return redirect()->back();


            }

        }else{
            return 'error';
        }


    }
    public function reply_message_form($id){
        $check_user=Company::where('user_id',$id)->count();
        if($check_user == 0)
        {
            $check_user=Invest::where('user_id',$id)->count();
            if($check_user > 0) {
                $user_type ='i';
                $user_data=Invest::where('user_id',$id)->first();
            }else{
                return 'error';
            }

        }
        else{
            $user_data=Company::where('user_id',$id)->first();

            $user_type='c';
        }


        return view('user.inves.reply_msg',['com'=>$user_data,'type'=>$user_type]);

    }
    public function received_msg_delete($id)
    {
        $data=Message::where('id',$id)->first();

        if(Auth::user()->id == $data->to_user ) {
            if (Message::where('id', $id)->update(['soft_del' => 'yes'])){
                Session::flash('msg_delete','Your msg was successfully deleted');
                return redirect()->back();


            }

        }else{
            return 'error';
        }


    }

    public function send_msg_view($id)
    {
        $data=Message::where('id',$id)->first();

        if(Auth::user()->id == $data->from_user ) {
                return view('user.inves.msg_view',['data'=>$data]);




        }else{
            return 'error';
        }


    }

    public function search_form_main()
    {
        return view('user.inves.search_form');
    }
    public function search(Request $request)
    {
        if ($request->type == 'com') {
            $company = Company::where('name', $request->name);
            if ($company->count() > 0) {
                return view('user.inves.other_com_detail', ['data' => $company->first()]);
            } else {
                $asso = AssoModel::where('name', $request->name);
                if ($asso->count() > 0) {
                    return view('user.inves.asso_detail', ['data' => $asso->first()]);
                } else {
                    Session::flash('empty', 'empty');
                    return view('user.inves.search_form');

                }
            }
        } else {
            $inves = Invest::where('name', $request->name);
            if ($inves->count() > 0) {
                return view('user.inves.see_inves_who_like', ['data' => $inves->first()]);
            } else {
                Session::flash('empty', 'empty');

                return view('user.inves.search_form');

            }

        }
    }

    public function received_msg_view($id)
    {
        $data=Message::where('id',$id)->first();

        if(Auth::user()->id == $data->to_user ) {
            return view('user.inves.received_msg_view',['data'=>$data]);




        }else{
            return 'error';
        }


    }
    public function reply_msg(Request $request)
    {
        $id = $request->to_user;
        $check_user = Company::where('user_id', $id)->count();
        if ($check_user == 0) {
            $check_user = Invest::where('user_id', $id)->count();
            if ($check_user > 0) {
                $user_type = 'i';
                $user_data = Invest::where('user_id', $id)->first();
            } else {
                return 'error';
            }

        } else {
            $user_data = Company::where('user_id', $id)->first();

            $user_type = 'c';
        }
        if ($request->from_user != Auth::user()->id) {
            return 'not-allow';

        }
        $input = $request->except('_token');
        $input['from_type'] = 'i';
        $input['to_type'] = $user_type;
        $input['soft_del'] = 'no';
        $input['status'] = 'unread';

        if (Message::create($input)) {
            Session::flash('email', 'replied');

            return redirect('inves/send_msg');

        }
    }
    public function see_company($id){
        $com=Company::where('id',$id)->first();
        return view('user.inves.see_company',['data'=>$com]);
    }
    public function see_company_activities($id){
        $com=Company::where('id',$id)->first();

        $data=Acitivity::where('user_id',$com->user_id)->get();
        return view('user.inves.see_company_activities',['data'=>$data,'com_data'=>$com]);
    }
    public function sendMail(Request $request)
    {
        $id=$request->to_user;
        $check_user=Company::where('user_id',$id)->count();
        if($check_user == 0)
        {
            $check_user=Invest::where('user_id',$id)->count();
            if($check_user > 0) {
                $user_type ='i';
                $user_data=Invest::where('user_id',$id)->first();
            }else{
                return 'error';
            }

        }
        else{
            $user_data=Company::where('user_id',$id)->first();

            $user_type='c';
        }
        if ($request->from_user != Auth::user()->id) {
            return 'not-allow';

        }
        $input=$request->except('_token');
        $input['from_type']='i';
        $input['to_type']=$user_type;
        $input['soft_del']='no';
        $input['status']='unread';

       if(Message::create($input)){
           Session::flash('email', 'send');

           return redirect()->back();

       }

        /* $data=['content'=>$request->message,'to_email'=>$request->to_email,'fromemail' => $request->fr_email,'fromname'=>$request->fr_name, 'langid' => 'd'];
         Mail::send(['html'=>'user.inves.mail'],$data,function ($message) use ($data) {

             $message->from('yeyintnaung@thebanyanmm.org','Matery Co.Ltd');

             $message->to($data['to_email']);
             $message->cc($data['fromemail']);
             $message->replyTo($data['fromemail'],$data['fromname']);

             //Attach file

             //Add a subject
             $message->subject("you have received an email from ".$data['fromemail']);
         });
            Session::flash('email', 'send');

            return redirect()->back();
        */


    }

    public function invest_require_form()
    {
        if (Auth::user()->type != 2) {
            return 'error';
        }
        $inc = Invest::where('user_id', Auth::user()->id)->count();
        if ($inc > 0) {
            return redirect('inves/dashboard');
        }
        return view('user.inves.requirement');
    }

    public function invest_require(Request $request)
    {
        if (Auth::user()->type != 2) {
            return 'error';
        }
        $inc = Invest::where('user_id', Auth::user()->id)->count();
        if ($inc > 0) {
            return redirect('inves/dashboard');
        } else {
            $validator = Validator::make($request->all(), ['name' => 'required|min:2|max:50', 'country_id_to_invest'=>'required|min:1','city_id'=>'required|min:1',
                'phone' => 'required|numeric|digits_between:5,14','background_info'=>'required|min:1|max:700','address'=>'required|min:1|max:100', 'business_hub_id' => 'required|min:1|max:230','stage_of_product'=>'required|min:1|max:100', 'country_id' => 'required|numeric|min:1', 'budget_min' => 'required|numeric|max:10000000', 'budget_max' => 'required|numeric|max:10000000']);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            } else {
                $input = $request->all();
                $input['stage_of_product']=implode(',',$request->stage_of_product);
                $input['business_hub_id']=implode(',',$request->business_hub_id);
                $input['user_id'] = Auth::user()->id;
                if (Invest::create($input)) {
                    Session::flash('success', 'registered');
                    return redirect()->back();
                }
            }

        }
    }

    public function get_plan()
    {

        $inves_data = Invest::where('user_id', Auth::user()->id)->first();
        $inves_bhub_array=explode(',', $inves_data->business_hub_id);
        $data = DB::table('business_plan')->select('business_plan.id as bid', 'business_plan.*', 'business_plan.created_at as bcr', 'business_plan.description as bd', 'company.description as cd', 'business_plan.updated_at as bup', 'company.*', 'company.created_at as ccr', 'company.updated_at as cup')->join('company', 'business_plan.company_id', '=', 'company.id')->whereIn('business_plan.business_hub_id',$inves_bhub_array)->where('business_plan.country_id', '=', $inves_data->country_id)->orderBy('business_plan.created_at', 'desc')->paginate(5)->items();
        return $data;
    }

    public function inves_req_detail()
    {
        if (Auth::user()->type != 2) {
            return 'error';
        }
        $inc = Invest::where('user_id', Auth::user()->id)->count();
        if ($inc == 0) {
            return redirect('inves/dashboard');
        }
        $in_data = Invest::where('user_id', Auth::user()->id)->first();
        return view('user.inves.inves_req_detail', ['data' => $in_data]);
    }

    public function inves_req_edit_form()
    {
        if (Auth::user()->type != 2) {
            return 'error';
        }
        $inc = Invest::where('user_id', Auth::user()->id)->count();
        if ($inc == 0) {
            return redirect('inves/dashboard');
        }
        $inc_edit = Invest::where('user_id', Auth::user()->id)->first();
        return view('user.inves.inves_edit', ['data' => $inc_edit]);
    }

    public function inves_req_edit(Request $request)
    {
        if (Auth::user()->type != 2) {
            return 'error';
        }
        $inc = Invest::where('user_id', Auth::user()->id)->count();
        if ($inc == 0) {
            return redirect('inves/dashboard');
        } else {
            $validator = Validator::make($request->all(), ['name' => 'required|min:2|max:50', 'country_id_to_invest'=>'required|min:1','city_id'=>'required|min:1',
                'phone' => 'required|numeric|digits_between:5,14','background_info'=>'required|min:1|max:700','address'=>'required|min:1|max:100', 'business_hub_id' => 'required|min:1|max:230','stage_of_product'=>'required|min:1|max:100', 'country_id' => 'required|numeric|max:197', 'budget_min' => 'required|numeric|max:10000000', 'budget_max' => 'required|numeric|max:10000000']);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            } else {
                $input = $request->except('_token');
                $input['stage_of_product']=implode(',',$request->stage_of_product);
                $input['business_hub_id']=implode(',',$request->business_hub_id);
                $input['user_id'] = Auth::user()->id;
                if (Invest::where('user_id', Auth::user()->id)->update($input)) {
                    Session::flash('success', 'edited');
                    return redirect('inves_require_detail');
                }
            }
        }
    }

    public function businessnew()
    {
        $news = News::whereMonth('created_at', Carbon::now()->month)->where('NewsCategory_id', 1)->orderBy('created_at', 'desc')->paginate(10);
        return view('user.inves.businessnew', ['news' => $news]);
    }

    public function othernews()
    {
        $news = News::whereMonth('created_at', Carbon::now()->month)->where('NewsCategory_id', 2)->orderBy('created_at', 'desc')->paginate(10);
        return view('user.inves.other_news', ['news' => $news]);
    }
    public function events()
    {
        if (Auth::user()->type == 1) {
            $get_data = Company::where('user_id', Auth::user()->id)->first();
            if(!empty($get_data)) {
                $bid = $get_data->business_hub_id;
            }else{
                $bid='';
            }
        } else {
            $get_data = Invest::where('user_id', Auth::user()->id)->first();
            if(!empty($get_data)) {
                $bid = $get_data->business_hub;
            }else{
                $bid='';
            }

        }
        $imp_events =Events::where('business_hub_id',$bid)->orderBy('created_at', 'desc')->limit(20)->get();
        $events=Events::whereMonth('created_at','!=','')->orderBy('created_at','desc')->get();
        return view('user.inves.events',['events'=>$events,'imp_events'=>$imp_events,'bid'=>$bid]);
    }
    public function getlike($id)
    {
        //remain you have to validate the user is already liked

        $old_like_count = Bussinessplan::where('id', $id)->first();
        $visitor_id_array = explode(',', $old_like_count->visitor_id);
        if (!in_array(Auth::user()->id, $visitor_id_array)) {
            $new_v_id = $old_like_count->visitor_id . ',' . Auth::user()->id;
            Bussinessplan::where('id', $id)->update(['visitor_id' => $new_v_id]);
            $new_like_count = $old_like_count->like_count + 1;
        } else {
            $new_like_count = $old_like_count->like_count;

        }

        $count_like = Bussinessplan::where('id', $id)->update(['like_count' => $new_like_count]);
        if ($count_like) {
            $new_like_count_to_res = Bussinessplan::where('id', $id)->first();

            return Response::json([
                'Success' => $new_like_count_to_res->like_count,

            ]);
        }

    }

    public function delike($id)
    {
        //remain you have to validate the user is already liked
        $old_like_count = Bussinessplan::where('id', $id)->first();
        $visitor_id_array = explode(',', $old_like_count->visitor_id);
        if (in_array(Auth::user()->id, $visitor_id_array)) {
            if (($key = array_search(Auth::user()->id, $visitor_id_array)) !== false) {
                unset($visitor_id_array[$key]);
            }
            $visitor_id_string = implode(',', $visitor_id_array);
            $new_like_count = $old_like_count->like_count - 1;
            $count_like = Bussinessplan::where('id', $id)->update(['like_count' => $new_like_count, 'visitor_id' => $visitor_id_string]);
            if ($count_like) {
                $new_like_count_to_res = Bussinessplan::where('id', $id)->first();

                return Response::json([
                    'Success' => $new_like_count_to_res->like_count,

                ]);
            }

        } else {
            $new_like_count_to_res = Bussinessplan::where('id', $id)->first();

            return Response::json([
                'Success' => $new_like_count_to_res->like_count,

            ]);
        }


    }
    public function adv_search(Request $request)
    {
        $com = Company::where([['user_id', '!=', Auth::user()->id,], ['business_hub', '=', $request->business_hub_id], ['country_id', '=', $request->country_id], ['city_id', '=', $request->city_id]])->get();
        $asso = AssoModel::where([['user_id', '!=', Auth::user()->id,], ['business_hub', '=', $request->business_hub_id], ['country', '=', $request->country_id], ['city', '=', $request->city_id]])->get();
        $inves = Invest::where([['user_id', '!=', Auth::user()->id,], ['business_hub_id', '=', $request->business_hub_id], ['country_id', '=', $request->country_id], ['city_id', '=', $request->city_id]])->get();
        return view('user.inves.search_result', ['com' => $com, 'asso' => $asso, 'inves' => $inves]);

    }
    public function search_form()
    {
        return view('user.inves.search');
    }


}
