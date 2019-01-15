<?php

namespace App\Http\Controllers;

use App\Bussinessplan;
use App\Company;
use App\Plans;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class BusinessController extends Controller
{
    //
    public function __construct()
    {

        $this->middleware('auth');
        $this->middleware('block');

        $this->middleware('type');
        $this->middleware('Plans',['except'=>['business_plan_view','business_plan_detail','business_plan_edit_form','business_plan_edit','business_plan_delete']]);




    }

    public function video()
    {
        $target_dir = "users/entro/photo/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        $uploadOk = 1;
        echo $uploadOk;
        move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

    }
    public function business_plan_view()
    {
        $com=Company::where('user_id',Auth::user()->id)->first();
        $has=Bussinessplan::where('company_id',$com->id);
        if($has->count() > 0){
            return view('user.entra.business_plan_view_table',['com_id'=>$com->id,'data'=>$has->get()]);
        }
        return view('user.entra.business_plan_view');
    }
    public function business_plan_upload(Request $request)
    {
        $user=Auth::user();
        if($user->can('create',Plans::class)){

        }else{
            return view('balance.plan_create_limit');
        }
        $validator = Validator::make($request->all(), ['title' => 'required|min:2|max:50','competitor_des'=>'required|min:1|max:200', 'business_group_id'=>'required|numeric|min:1|max:10000','user_position'=>'required|min:1|max:300','founders'=>'required|min:1|max:300','background_founders'=>'required|min:11|max:500','count_employees'=>'required|min:0|max:100000','background_employees'=>'required|min:10|max:500',
            'looking_investment'=>'required|min:1|max:500','sharer'=>'required|min:1|max:500','monthly_revenues'=>'required|min:1|max:500','monthly_expenses'=>'required|min:1|max:500','stage_of_product'=>'required|min:1|max:100','description' => 'required|min:10|max:1120', 'business_hub_id' => 'required|numeric', 'country_id' => 'required|numeric', 'city_id' => 'required|numeric','video_url' => 'mimetypes:video/mp4']);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $input = $request->except('_token');
            if (!empty($request->file('video_url'))) {
                  $vname = Carbon::now()->timestamp . $request->file('video_url')->getClientOriginalName();
                   $request->file('video_url')->move(base_path() . '/public/users/entro/video/',$vname);
              
                $input['video_url'] = $vname;
            }
            else {
                $input['video_url']='';
            }
                $input['visitor_id'] = '0';
                $input['like_count'] = '0';

                $get_company_id=DB::table('company')->where('user_id',Auth::user()->id)->first();
                $input['company_id'] = $get_company_id->id;
                $input['visitor_count'] = 0;
                $input['status'] = 1;

                if (Bussinessplan::create($input)) {
                    Session::flash('success', 'created');
                    return redirect('entra/bussiness_plan_view');
                }
            }


    }

    public function business_plan_detail($id)
    {
        $detail = Bussinessplan::where('id', $id)->first();
        return view('user.entra.business_plan_detail', ['data' => $detail]);

    }

    public function business_plan_edit_form($id)
    {
        $detail = Bussinessplan::where('id', $id)->first();
        return view('user.entra.business_plan_edit', ['data' => $detail]);

    }

    public function business_plan_edit(Request $request)
    {
        $validator = Validator::make($request->all(), ['title' => 'required|min:2|max:50','competitor_des'=>'required|min:1|max:200', 'business_group_id'=>'required|numeric|min:1|max:10000','user_position'=>'required|min:1|max:300','founders'=>'required|min:1|max:300','background_founders'=>'required|min:11|max:500','count_employees'=>'required|min:0|max:100000','background_employees'=>'required|min:10|max:500',
            'looking_investment'=>'required|min:1|max:500','sharer'=>'required|min:1|max:500','monthly_revenues'=>'required|min:1|max:500','monthly_expenses'=>'required|min:1|max:500','stage_of_product'=>'required|min:1|max:100','description' => 'required|min:10|max:1120', 'business_hub_id' => 'required|numeric', 'country_id' => 'required|numeric', 'city_id' => 'required|numeric','video_url' => 'mimetypes:video/mp4']);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        } else {
            $old_data = Bussinessplan::where('id', $request->id)->first();
            if (!empty($request->file('video_url'))) {
                if(!empty($old_data->video_url)){
                if(File::exists(base_path() . '/public/users/entro/video/'.$old_data->video_url)){
                if (unlink(base_path()  . '/public/users/entro/video/' . $old_data->video_url)) {

                } else {
                    return 'Cannot Delete';
                }
                }
                }
                $request->file('video_url')->move(base_path() . '/public/users/entro/video', Carbon::now()->timestamp . $request->file('video_url')->getClientOriginalName());
                $data_video = Carbon::now()->timestamp . $request->file('video_url')->getClientOriginalName();
            }else{
                $data_video=$old_data->video_url;
            }
        $input = $request->except('_token','_wysihtml5_mode');
        $input['video_url'] = $data_video;
        $get_company_id=DB::table('company')->where('user_id',Auth::user()->id)->first();
        $input['company_id'] = $get_company_id->id;
        $input['status'] = 1;
        if (Bussinessplan::where('id', $request->id)->update($input)) {
            Session::flash('success', 'edited');
            return redirect('entra/business_plan_detail/'.$request->id);
        } else {
            echo 'Error Please Try Again';
        }
        }

    }
    public function business_plan_delete($id){
        if(preg_match('/business_plan_detail/',url()->previous())){
            $delete=Bussinessplan::findOrFail($id);
            $file_path='users/entro/video/';
            if(!empty($delete->video_url)) {
                if (File::exists($file_path . $delete->video_url)) File::delete($file_path . $delete->video_url);
            }
            $delete->delete();
            Session::flash('success','deleted');
            return redirect('entra/bussiness_plan_view');

        }



    }

}
