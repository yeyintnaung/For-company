<?php

namespace App\Http\Controllers;

use App\Acitivity;
use App\AssoModel;
use App\Company;
use App\Events;
use App\BplanMail;
use App\Projectmail;
use App\Invest;
use App\Message;
use App\Plans;
use App\Rating;
use App\Tender;
use App\News;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UploadprojectController extends Controller
{
   public function upload_project()
   {
       return view('user.entra.upload_project');
   }
   public function upload_project2(Request $request)
   {
      //echo $request->title."<br>";echo $request->description."<br>";echo $request->business_hub_id."<br>";echo $request->bdaytime."<br>";echo $request->phone."<br>";echo $request->address."<br>";

       $ok = DB::table('third_party')->insert(['com_id' => Auth::user()->id, 'prj_title' => $request->title, 'description' => $request->description, 'business_hub_id' => $request->business_hub_id, 'phone' => $request->phone, 'address' => $request->address,  'expire_date' => $request->expire_date, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
       if($ok>0)
       {
           Session::flash('project', 'created');
           return redirect('entra/view_project');
       }
   }
    public function view_project()
    {
        $data = DB::table('third_party')
                        ->where('com_id', '=', Auth::user()->id)
                        ->orderBy('created_at', 'desc')
                        ->get();
        return view('user.entra.view_project', ['data' => $data]);
    }

}
