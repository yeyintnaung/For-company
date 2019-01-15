<?php

namespace App\Http\Controllers;

use App\Acitivity;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Tests\AcceptHeaderTest;

class InvesAcitivityController extends Controller
{
    //
    public function __construct()
    {

        $this->middleware('auth');
                $this->middleware('block');

        $this->middleware('investype');


    }

    public function activity()
    {
        $data = Acitivity::where('user_id', Auth::user()->id)->get();
        return view('user.inves.activity', ['data' => $data]);
    }

    public function create_activity_form()
    {
        return view('user.inves.create_acitivity_form');
    }

    public function edit_activity_form($id)
    {
        $data = Acitivity::where('id', $id)->first();

        return view('user.inves.edit_activity_form', ['data' => $data]);
    }

    public function edit_activity(Request $request)
    {
        $old_data = Acitivity::where('id', $request->id)->first();

        $validator = Validator::make($request->all(), ['description' => 'required|min:10|max:1120']);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        } else {
            if (!empty($request->file('image'))) {
                if (unlink($_SERVER['DOCUMENT_ROOT'] . '/Company/public/users/inves/photo/' . $old_data->image)) {

                } else {
                    return 'Cannot Delete';
                }
                $request->file('image')->move(base_path() . '/public/users/inves/photo', Carbon::now()->timestamp . $request->file('image')->getClientOriginalName());
                $logoname = Carbon::now()->timestamp . $request->file('image')->getClientOriginalName();
            } else {
                $logoname = $old_data->image;
            }
            $input = $request->except('_token','_wysihtml5_mode');
            $input['user_id'] = Auth::user()->id;
            $input['image'] = $logoname;
            Acitivity::where('id', $request->id)->update($input);
            Session::flash('activity', 'edited');
            return redirect('inves/inves_activities');
        }
    }

    public function create_activity(Request $request)
    {
        $validator = Validator::make($request->all(), ['description' => 'required|min:10|max:1120', 'image' => 'required|mimes:jpeg,bmp,png,jpg,gif']);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        } else {
            if (!empty($request->file('image'))) {
                $request->file('image')->move(base_path() . '/public/users/inves/photo', Carbon::now()->timestamp . $request->file('image')->getClientOriginalName());
            }
            $logoname = Carbon::now()->timestamp . $request->file('image')->getClientOriginalName();
            $input = $request->except('_token');
            $input['user_id'] = Auth::user()->id;
            $input['image'] = $logoname;
            Acitivity::create($input);
            Session::flash('activity', 'added');
            return redirect('inves/inves_activities');
        }


    }

    public function activity_delete($id){
        $check_id=Acitivity::where('id',$id)->first();
        if($check_id->user_id == Auth::user()->id){
            unlink($_SERVER['DOCUMENT_ROOT'] . '/Company/public/users/inves/photo/' . $check_id->image);

            Acitivity::where('id',$id)->delete();
            Session::flash('activity', 'deleted');
            return redirect('inves/inves_activities');
        }
        else{
            return 'error';
        }
    }
    public function other_activity($id)
    {
        $data = Acitivity::where('user_id', $id)->get();
        return view('user.inves.activity', ['data' => $data]);
    }
}
