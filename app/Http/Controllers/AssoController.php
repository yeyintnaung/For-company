<?php

namespace App\Http\Controllers;

use App\Acitivity;
use App\AssoModel;
use App\AssoRequest;
use App\Company;
use App\Events;
use App\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AssoController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('block');

        $this->middleware('asso_type', ['except' => ['asso_register_form', 'asso_register']]);
    }

    public function index()
    {
        return view('user.asso.dashboard');
    }

    public function asso_detail()
    {
        $data = AssoModel::where('user_id', Auth::user()->id);
        if ($data->count() == 0) {
            return redirect('asso/asso_register');

        } else {
            return view('user.asso.asso_detail', ['data' => $data->first()]);
        }
    }


    public function asso_detail_edit_form()
    {
        $data = AssoModel::where('user_id', Auth::user()->id);
        if ($data->count() == 0) {
            return redirect('asso/asso_register');

        } else {
            return view('user.asso.asso_detail_edit', ['data' => $data->first()]);
        }
    }

    public function asso_detail_edit(Request $request)
    {
        $input = $request->except('_token');
        $validator = Validator::make($input, ['name' => 'required|min:5|max:20', 'business_hub' => 'required|min:1|max:20', 'country' => 'required|numeric|min:1|max:30', 'city' => 'required|numeric|max:4', 'logo' => 'mimes:jpeg,bmp,png,jpg,gif', 'address' => 'required|max:1144', 'phone' => 'required|numeric|digits_between:5,14', 'web' => 'max:27', 'facebook' => 'max:27', 'description' => 'required|min:12|max:3330']);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        } else {
            $input['user_id'] = Auth::user()->id;
            $input['members_id'] = '';
            if (AssoModel::where('id', $request->id)->update($input)) {
                Session::flash('Edited', 'Sucessfully Edited');
                return redirect('asso/asso_detail');

            }
        }
    }

    public function asso_register_form()
    {
        if (Auth::user()->type != 3) {
            return 'error';
        }
        $inc = AssoModel::where('user_id', Auth::user()->id)->count();
        if ($inc > 0) {
            return redirect('asso/asso_detail');
        } else {

            return view('user.asso.asso_register');
        }
    }

    public function asso_register(Request $request)
    {
        if (Auth::user()->type != 3) {
            return 'error';
        }
        $inc = AssoModel::where('user_id', Auth::user()->id)->count();
        if ($inc > 0) {
            return redirect('asso/asso_detail');
        } else {
            $input = $request->except('_token');
            $validator = Validator::make($input, ['name' => 'required|min:5|max:20', 'business_hub' => 'required|min:1|max:20', 'country' => 'required|numeric|min:1|max:30', 'city' => 'required|numeric|max:4', 'logo' => 'mimes:jpeg,bmp,png,jpg,gif', 'address' => 'required|max:144', 'phone' => 'required|numeric|digits_between:5,14', 'web' => 'max:27', 'facebook' => 'max:27', 'description' => 'required|min:12|max:3330']);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            } else {
                $input['user_id'] = Auth::user()->id;
                $input['members_id'] = '0';
                if (AssoModel::create($input)) {
                    return redirect('asso/asso_detail')->with('Added', 'Sucessfully Added');

                }
            }

        }
    }

    public function request_message()
    {
        $request_message = AssoRequest::where([['confirm', '=', 'no'], ['asso_user', '=', Auth::user()->id]])->get();
        return view('user.asso.request', ['rm' => $request_message]);
    }

    public function request_view($id)
    {
        $data = AssoRequest::where('id', $id)->first();
        if (Auth::user()->id != $data->asso_user) {
            return 'error';
        } else {
            return view('user.asso.request_view', ['data' => $data]);
        }
    }

    public function confirm_request($id)
    {
        $data = AssoRequest::where('id', $id)->first();
        if (Auth::user()->id != $data->asso_user) {
            return 'error';
        } else {
            $members_id = $data->members_id . ',' . $data->user_id;
            if (AssoModel::where('user_id', Auth::user()->id)->update(['members_id' => $members_id])) {
                AssoRequest::where('id', $id)->delete();
                Session::flash('join','New members was joined....');
                return redirect('asso/members');
            }
        }
    }

    public function members()
    {
        $data = AssoModel::where('user_id', Auth::user()->id)->first();
        $member_arry = explode(',', $data->members_id);
        return view('user.asso.members', ['data' => $member_arry]);
    }

    public function member_detail($id)
    {
        $data = Company::where('user_id', $id)->first();
        return view('user.asso.member_detail', ['data' => $data]);
    }

    public function see_company_activities($id)
    {
        $com = Company::where('id', $id)->first();

        $data = Acitivity::where('user_id', $com->user_id)->get();
        return view('user.asso.see_company_activities', ['data' => $data, 'com_data' => $com]);

    }

    public function create_activity_form()
    {
        return view('user.asso.create_activity_form');
    }

    public function create_activity(Request $request)
    {
        $validator = Validator::make($request->all(), ['description' => 'required|min:10|max:1120', 'image' => 'required|mimes:jpeg,bmp,png,jpg,gif']);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        } else {
            if (!empty($request->file('image'))) {
                $request->file('image')->move(base_path() . '/public/users/asso/photo', Carbon::now()->timestamp . $request->file('image')->getClientOriginalName());
            }
            $logoname = Carbon::now()->timestamp . $request->file('image')->getClientOriginalName();
            $input = $request->except('_token');
            $input['user_id'] = Auth::user()->id;
            $input['image'] = $logoname;
            Acitivity::create($input);
            Session::flash('activity', 'Your activity was sucessfully added.....');
            return redirect('asso/asso_activities');
        }


    }

    public function activity()
    {
        $data = Acitivity::where('user_id', Auth::user()->id)->get();
        return view('user.asso.activity', ['data' => $data]);
    }

    public function edit_activity_form($id)
    {

        $data = Acitivity::where('id', $id)->first();
        if ($data->user_id != Auth::user()->id) {
            return 'error';
        } else {
            return view('user.asso.edit_activity_form', ['data' => $data]);
        }
    }

    public function edit_activity(Request $request)
    {
        $old_data = Acitivity::where('id', $request->id)->first();
        if ($old_data->user_id != Auth::user()->id) {
            return 'error';
        }

        $validator = Validator::make($request->all(), ['description' => 'required|min:10|max:1120']);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        } else {
            if (!empty($request->file('image'))) {
                if (unlink($_SERVER['DOCUMENT_ROOT'] . '/Company/public/users/asso/photo/' . $old_data->image)) {

                } else {
                    return 'Cannot Delete';
                }
                $request->file('image')->move(base_path() . '/public/users/asso/photo', Carbon::now()->timestamp . $request->file('image')->getClientOriginalName());
                $logoname = Carbon::now()->timestamp . $request->file('image')->getClientOriginalName();
            } else {
                $logoname = $old_data->image;
            }
            $input = $request->except('_token', '_wysihtml5_mode');
            $input['user_id'] = Auth::user()->id;
            $input['image'] = $logoname;
            Acitivity::where('id', $request->id)->update($input);
            Session::flash('activity', 'Your activity was sucessfully edited');
            return redirect('asso/asso_activities');
        }
    }

    public function activity_delete($id)
    {
        $check_id = Acitivity::where('id', $id)->first();
        if ($check_id->user_id == Auth::user()->id) {
            unlink($_SERVER['DOCUMENT_ROOT'] . '/Company/public/users/asso/photo/' . $check_id->image);
            Acitivity::where('id', $id)->delete();
            Session::flash('activity', 'deleted');
            return redirect('asso/asso_activities');
        } else {
            return 'error';
        }
    }
    public function businessnew()
    {
        $news = News::whereMonth('created_at', Carbon::now()->month)->where('NewsCategory_id', 1)->orderBy('created_at', 'desc')->get();
        return view('user.asso.businessnew', ['news' => $news]);
    }

    public function othernews()
    {
        $news = News::whereMonth('created_at', Carbon::now()->month)->where('NewsCategory_id', 2)->orderBy('created_at', 'desc')->get();
        return view('user.asso.other_news', ['news' => $news]);
    }
    public function events()
    {
        $events=Events::whereMonth('created_at','!=','')->orderBy('created_at','desc')->get();
        return view('user.asso.events',['events'=>$events]);
    }
}
