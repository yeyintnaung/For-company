<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ConstructplanadminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function construct_plan_all(){
           $plans=DB::table('construct_plan')->get();
           return view('construct_plan.construct_plan',['data'=>$plans]);
    }
    public function edit_cplan($id){
        $data=DB::table('construct_plan')->where('id',$id)->first();
        return view('construct_plan.edit',['data'=>$data]);

    }
    public function edit_cplan_save(Request $request,$id){
        DB::table('construct_plan')->where('id',$request->id)->update(['amount'=>$request->amount,'point'=>$request->point]);
        Session::flash('success','success');
        return redirect('construct_plan');
    }
}
