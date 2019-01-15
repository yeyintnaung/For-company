<?php

namespace App\Http\Controllers;

use App\Acitivity;
use App\AssoModel;
use App\AssoRequest;
use App\BusinessGroup;
use App\BusinessHub;
use App\Company;
use App\Invest;
use App\Message;
use App\News;
use App\Plans;
use App\ProjectsModel;
use Carbon\Carbon;
use App\BplanMail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\In;

class EntrotwoController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('block');

        $this->middleware('type');
        $this->middleware('NeedToRegister');
        // $this->middleware('Plans');


    }

    public function association()
    {
        $com_count = Company::where('user_id', Auth::user()->id)->count();
        if ($com_count == 0) {
            return redirect('company_register_form');
        }
        $company_b_type = Company::where('user_id', Auth::user()->id)->first();

        $asso = AssoModel::where('business_hub', $company_b_type->business_hub)->get();
        return view('user.entra.asso', ['data' => $asso]);
    }

    public function asso_detail($id)
    {
        $data = AssoModel::where('id', $id);


        return view('user.entra.asso_detail', ['data' => $data->first()]);


    }

    public function project_dashboard()
    {
        $projects = ProjectsModel::where('business_hub_id', Auth::user()->business_hub_id)->get();
        return $projects;


    }

    public function create_project_form()
    {
        return view('user.entra.project_create');


    }

    public function create_project(Request $request)
    {
        $validator = Validator::make($request->all(), ['name' => 'required|max:200', 'description' => 'required|max:1000', 'expire_date' => 'required|date', 'business_hub_id' => 'required|numeric|min:1|max:1000']);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            if (!empty($request->file('attachment1'))) {

                $request->file('attachment1')->move(base_path() . '/public/users/entra/photo/project', Carbon::now()->timestamp . $request->file('attachment1')->getClientOriginalName());
                $attachment1 = Carbon::now()->timestamp . $request->file('attachment1')->getClientOriginalName();

            } else {
                $attachment1 = '';
            }
            if (!empty($request->file('attachment2'))) {

                $request->file('attachment2')->move(base_path() . '/public/users/entra/photo/project', Carbon::now()->timestamp . $request->file('attachment2')->getClientOriginalName());
                $attachment2 = Carbon::now()->timestamp . $request->file('attachment2')->getClientOriginalName();

            } else {
                $attachment2 = '';
            }
            $input = $request->except('_wysihtml5_mode');
            $input['attachment1'] = $attachment1;
            $input['attachment2'] = $attachment2;
            $input['publish'] = $input['pub'];
            $input['competitors'] = '';
            $input['competitor_count'] = 0;
            $input['mark'] = '';
            $input['user_id'] = Auth::user()->id;
            if (ProjectsModel::create($input)) {
                Session::flash('project', 'created');
                return redirect('entra/project_view');
            }
        }


    }

    public function project_view()
    {
        $data = ProjectsModel::where('user_id', Auth::user()->id)->paginate(6);
        return view('user.entra.project_view', ['data' => $data]);
    }

    public function send_message_project_form($id, $projectid)
    {
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


        return view('user.entra.send_message_for_project', ['com' => $user_data, 'type' => $user_type, 'projectid' => $projectid]);
    }

    public function send_message_project(Request $request)
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
        $input['from_type'] = 'c';
        $input['to_type'] = $user_type;
        $input['status'] = 'unread';
        $input['soft_del'] = 'no';

        if (Message::create($input)) {
            Session::flash('send', 'Send');
            $to_change_link = ProjectsModel::where('id', $request->project_id)->first();
            if ($to_change_link->user_id == Auth::user()->id) {
                $dy_link_name = 'project_detail';

            } else {
                $dy_link_name = 'other_project_detail';
            }

            return redirect('entra/' . $dy_link_name . '/' . $request->project_id);

        }


    }

    public function other_project_view()
    {
        $user_plan_data = Plans::where('user_id', Auth::user()->id);
        if($user_plan_data->count() == 0){
            $view_project = '1000';
        }
        else{
            $view_project=$user_plan_data->first()->view_project;
        }
        $com_count = Company::where('user_id', Auth::user()->id)->count();
        if ($com_count == 0) {
            return redirect('company_register_form');
        }
        $com = Company::where('user_id', Auth::user()->id)->first();
        $business_group = BusinessHub::where('id', $com->business_hub)->first();
        $data = ProjectsModel::where([['user_id', '!=', Auth::user()->id], ['business_hub_id', $business_group->business_group_id], ['publish', '=', 1]])->limit($view_project)->paginate(6);
        return view('user.entra.other_project_view', ['data' => $data]);
    }

    public function other_project_detail($id)
    {

        $get_comp = ProjectsModel::where('id', $id)->first();
        if ($get_comp->user_id == Auth::user()->id) {
            return 'error';
        }
        $checkarr = explode(',', $get_comp->competitors);
        if (in_array(Auth::user()->id, $checkarr)) {
        } else {
            $competitorstring = $get_comp->competitors . ',' . Auth::user()->id;
            $competitorcount = $get_comp->competitors_count + 1;
            ProjectsModel::where('id', $id)->update(['competitors' => $competitorstring, 'competitor_count' => $competitorcount]);


        }

        $data = ProjectsModel::where('id', $id)->first();
        return view('user.entra.other_project_detail', ['data' => $data]);


    }

    public function project_detail($id)
    {


        $data = ProjectsModel::where('id', $id)->first();
        if ($data->user_id != Auth::user()->id) {
            return redirect()->back();
        }
        return view('user.entra.project_detail', ['data' => $data]);


    }

    public function edit_project_form($id)
    {
        $data = ProjectsModel::where('id', $id)->first();
        if (Auth::user()->id != $data->user_id) {
            return 'Not Allowed';
        }

        return view('user.entra.edit_project_form', ['data' => $data]);


    }

    public function delete_project($id)
    {
        $data = ProjectsModel::where('id', $id)->first();
        if (Auth::user()->id != $data->user_id) {
            return 'Not Allowed';
        }

        if (!empty($data->attachment1)) {


            if (File::exists(base_path() . '/public/users/entra/photo/project/' . $data->attachment1)) {

                unlink(base_path() . '/public/users/entra/photo/project/' . $data->attachment1);


            }
        }
        $data = ProjectsModel::where('id', $id)->delete();
        Session::flash('project', 'Successfully Deleted');
        return redirect('/entra/project_view');


    }

    public function edit_project(Request $request)
    {
        $old = ProjectsModel::where('id', $request->id)->first();
        if (Auth::user()->id != $old->user_id) {
            return 'Not Allowed';
        }

        $validator = Validator::make($request->all(), ['name' => 'required|max:200', 'description' => 'required|max:1000', 'expire_date' => 'required|date', 'business_hub_id' => 'required|numeric|min:1|max:1000']);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            if (!empty($request->file('attachment1'))) {
                if (!empty($old->attachment1)) {

                    if (File::exists(base_path() . '/public/users/entra/photo/project/' . $old->attachment1)) {

                        unlink(base_path() . '/public/users/entra/photo/project/' . $old->attachment1);

                    }
                }
                $request->file('attachment1')->move(base_path() . '/public/users/entra/photo/project', Carbon::now()->timestamp . $request->file('attachment1')->getClientOriginalName());
                $attachment1 = Carbon::now()->timestamp . $request->file('attachment1')->getClientOriginalName();
            } else {


                $attachment1 = $old->attachment1;


            }


            if (!empty($request->file('attachment2'))) {
                if (File::exists(base_path() . '/public/users/entra/photo/project/' . $old->attachment2)) {
                    unlink(base_path() . '/public/users/entra/photo/project/' . $old->attachment2);
                }

                $request->file('attachment2')->move(base_path() . '/public/users/entra/photo/project', Carbon::now()->timestamp . $request->file('attachment2')->getClientOriginalName());
                $attachment2 = Carbon::now()->timestamp . $request->file('attachment2')->getClientOriginalName();


            } else {
                $attachment2 = $old->attachment2;


            }
            $input = $request->except('_wysihtml5_mode');
            $input['attachment1'] = $attachment1;
            $input['attachment2'] = $attachment2;
            $input['user_id'] = Auth::user()->id;
            if (ProjectsModel::where('id', $request->id)->update($input)) {
                Session::flash('project', 'Edited');

                return redirect('entra/project_detail/' . $request->id);
            }
        }


    }

    public function asso_request_form($id)
    {

        $data = AssoModel::where('id', $id)->first();
        $member_arry = explode(',', $data->members_id);
        if (in_array(Auth::user()->id, $member_arry)) {
            return reditect()->back();
        } else {
            return view('user.entra.join_requests', ['data' => $data->first()]);
        }

    }

    public function asso_activity($id)
    {
        $asso_data = AssoModel::where('user_id', $id)->first();
        $member_arry = explode(',', $asso_data->members_id);
        if (in_array(Auth::user()->id, $member_arry)) {
            return reditect()->back();
        }
        $data = Acitivity::where('user_id', $id)->get();
        return view('user.entra.asso_activity', ['data' => $data, 'name' => $asso_data->name]);

    }

    public function asso_request(Request $request)
    {
        $data = AssoModel::where('id', $request->asso_id)->first();
        $member_arry = explode(',', $data->members_id);
        if (in_array(Auth::user()->id, $member_arry)) {
            return reditect()->back();
        }
        $input = $request->except('_token');
        $validator = Validator::make($input, ['com_id' => 'required|numeric|min:1|max:1111111', 'user_id' => 'required|numeric|min:1|max:1111111', 'asso_id' => 'required|numeric|min:1|max:1111111', 'asso_user' => 'required|numeric|min:1|max:1111111', 'request_message' => 'required|min:10|max:2000']);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        } else {
            $input['confirm'] = 'no';
            AssoRequest::create($input);
            Session::flash('request', 'Your request was successfully send....');
            return redirect()->back();

        }
    }

  
    public function get_mail_ajax($id)
    {
        $pdata = Projectmail::where([['id', '>', $id], ['to_user', Auth::user()->id], ['status', 'unread']])->orWhere([['id', '>', $id], ['from_user', Auth::user()->id], ['status', 'unread']]);
        foreach ($pdata->get() as $d) {
            $user_pdata[]= Company::where('user_id', $d->from_user)->orWhere('user_id',$d->to_user)->first();

        }
        $pcount = Projectmail::where([['id', '>', $id], ['to_user', Auth::user()->id]])->orWhere([['id', '>', $id], ['from_user', Auth::user()->id]])->count();
        if ($pcount == 0) {
            $psu = 0;
        } else {
            $psu = 1;
        }
        return Response::json([
            'data' => $pdata->get(),
            'type' => $user_pdata,
            'success' => $psu,

        ]);
    }
    public function get_bmail_ajax($id)
    {
        $bdata = BplanMail::where([['id', '>', $id], ['to_user', Auth::user()->id], ['status', 'unread']])->orWhere([['id', '>', $id], ['from_user', Auth::user()->id], ['status', 'unread']]);

        foreach ($bdata->get() as $d) {
            $user_bdata[]= Company::where('user_id', $d->from_user)->orWhere('user_id',$d->to_user)->first();
        }
        $bcount = BplanMail::where([['id', '>', $id], ['to_user', Auth::user()->id]])->orWhere([['id', '>', $id], ['from_user', Auth::user()->id]])->count();
        if ($bcount == 0) {
            $bsu = 0;
        } else {
            $bsu = 1;
        }
        return Response::json([
            'bdata' => $bdata->get(),
            'btype' => $user_bdata,
            'bsuccess' => $bsu

        ]);
    }


    public function read_new($id)
    {
        $news = News::where('id', $id)->get();
        return view('user.entra.readnew', ['news' => $news]);
    }
}
