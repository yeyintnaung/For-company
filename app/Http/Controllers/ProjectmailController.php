<?php

namespace App\Http\Controllers;

use App\Company;
use App\Projectmail;
use App\ProjectsModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class ProjectmailController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
                $this->middleware('block');


    }

    public function send_mail_form($project_id)
    {
        $project_data = ProjectsModel::where('id', $project_id)->first();
        $com = Company::where('user_id', $project_data->user_id)->first();

        return view('project_mail.send_mail', ['project_data' => $project_data, 'from_id' => Auth::user()->id, 'to_id' => $com->user_id, 'com' => $com]);
    }

    public function reply_mail($mail_id)
    {
        $mail_data = Projectmail::where('id', $mail_id)->first();
        $project_data = ProjectsModel::where('id', $mail_data->project_id)->first();
        $com = Company::where('user_id', $mail_data->from_user)->first();
        if (Auth::user()->id != $mail_data->to_user) {
            return 'error';
        }
        Session::put('pd', 'project direction');

        return view('project_mail.send_mail', ['project_data' => $project_data, 'from_id' => Auth::user()->id, 'to_id' => $mail_data->from_user, 'com' => $com]);
    }

    public function send_mail($project_id, Request $request)
    {
        if (Auth::user()->id != $request->from_user) {
            return 'not allow';
        }
        $com_check = Company::where('user_id', $request->to_user)->count();
        if ($com_check == 0) {
            return 'not allow';
        }
        $com_data = Company::where('user_id', $request->to_user)->first();
        $input = $request->all();
        $input['status'] = 'unread';
        $input['soft_del'] = 'no';
        $input['project_id'] = $project_id;
        Projectmail::create($input);
        Session::flash('email', 'send');
        if (Session::has('pd')) {
            return redirect('entra/project_detail/' . $project_id);

        }

        return redirect('entra/other_project_detail/' . $project_id);
    }

    public function view_mail($project_mail_id)
    {
        $projectm = Projectmail::where('id', $project_mail_id)->first();
        if ($projectm->from_user != Auth::user()->id and $projectm->to_user != Auth::user()->id) {

            return 'error';

        }
        return view('project_mail.mail_view', ['data' => $projectm]);
    }

    public function all_mails()
    {
        if (empty(Input::get('date'))) {
            $month = Carbon::now()->month;
            $year = Carbon::now()->year;
        }
        else {
            $month = Carbon::parse(Input::get('date'))->month;
            $year = Carbon::parse(Input::get('date'))->year;
        }
        $pmail = Projectmail::where(function ($query) {
            $query->where([['from_user', '=', Auth::user()->id],['to_user', '!=', Auth::user()->id]])->orWhere([['from_user', '!=', Auth::user()->id], ['to_user', '=', Auth::user()->id]]);
        })->withinMonth($month, $year);
        return view('user.entra.mails.projectmail.all_mails', ['data' => $pmail]);
    }

    public function send_mails_list()
    {
        if (empty(Input::get('date'))) {
            $month = Carbon::now()->month;
            $year = Carbon::now()->year;
        }
        else
        {
            $month = Carbon::parse(Input::get('date'))->month;
            $year = Carbon::parse(Input::get('date'))->year;
        }

        $pmail = Projectmail::where([['from_user', '=', Auth::user()->id]])->withinMonth($month, $year);
        return view('user.entra.mails.projectmail.all_mails', ['data' => $pmail]);
    }
    public function project_received_mails()
    {
        if (empty(Input::get('date'))) {
            $month = Carbon::now()->month;
            $year = Carbon::now()->year;

        } else {
            $month = Carbon::parse(Input::get('date'))->month;
            $year = Carbon::parse(Input::get('date'))->year;
        }

        $pmail = Projectmail::where([['to_user','=', Auth::user()->id]])->withinMonth($month, $year);
        return view('user.entra.mails.projectmail.all_mails', ['data' => $pmail]);
    }
}