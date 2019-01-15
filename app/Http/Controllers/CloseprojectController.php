<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CloseprojectController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function close_project(Request $request){
          $cd=DB::connection('mysql_service')->table('for_repair')->where('id',$request->id)->update(['close'=>'1']);
          DB::table('close_project_by_admin')->insert(['project_id'=>$request->id,'admin_id'=>Auth::guard('admin')->user()->id,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]);

          return redirect()->back();

    }
    public function open_project(Request $request){
            DB::connection('mysql_service')->table('for_repair')->where('id',$request->id)->update(['close'=>'0']);
            $count=DB::table('close_project_by_admin')->where('project_id',$request->id);
            if($count->count() > 0){
                $count->delete();
            }

        return redirect()->back();
    }
}
