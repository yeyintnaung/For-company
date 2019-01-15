<?php

namespace App\Http\Controllers;

use App\RegisterfeeModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterfeeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $fees = RegisterfeeModel::all();

        return view('registerfee.index', compact('fees'));
    }

    public function add_fee_form()
    {
        return view('registerfee.upload');
    }
    public function edit_form($id)
    {
        $fee=RegisterfeeModel::where('user_id',$id)->first();
        return view('registerfee.edit',['fee'=>$fee]);
    }
    public function edit($id,Request $request){
        $input=$request->except('_token');
        $old_data=RegisterfeeModel::where('user_id',$id)->first();
        $validator=Validator::make($input,['user_id'=>'required|unique:registration_fee,user_id,'.$old_data->id,'amount'=>'required']);
        if($validator->fails()){
            return 'user already exist';
        }
        if($request->start_date != ''){


            $expire_date = Carbon::parse($request->start_date)->addMonthNoOverflow();
            $input['expire_date']=$expire_date;
            $input['start_date']=Carbon::parse($request->start_date)->toDateTimeString();

        }else{
            $input['start_date']=$old_data->start_date;
            $input['expire_date']=$old_data->expire_date;

        }
        RegisterfeeModel::where('user_id',$id)->update($input);
        return redirect('register_fee')->with('update','New Article successfully edited');
    }

    public function detail($id)
    {
        $fee_detail=RegisterfeeModel::where('id',$id)->first();
        return view('registerfee.view',['fee_detail'=>$fee_detail]);
    }

    public function add_fee(Request $request)
    {
        $validator = Validator::make($request->all(), ['user_id' => 'required|unique:registration_fee,user_id']);
        if ($validator->fails()) {
            return 'This user already exist ';
        }
        $input = $request->all();
        $start_date = Carbon::now();
        $expire_date = Carbon::now()->addMonthNoOverflow();
        $input['start_date'] = $start_date;
        $input['expire_date'] = $expire_date;
        if (RegisterfeeModel::create($input)) {
            return redirect('register_fee')->with('add','New Article was successfully uploaded');
        } else {
            return 'connection error';
        }


    }
}
