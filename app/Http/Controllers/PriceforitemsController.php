<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PriceforitemsController extends Controller
{
    //


    public function addform()
    {
        return view('user.entra.price.add');
    }

    public function add_form_for_paint()
    {
        return view('user.entra.price.add_form_for_paint');
    }
    public function add_for_paint(Request $request)
    {
        if (($request->pctype != 'normal' and $request->pctype != 'middle' and $request->pctype != 'high') or ($request->Testion != 'yes' and $request->Testion != 'no') or ($request->clearing != 'yes' and $request->clearing != 'no')) {
            return 'error';
        }
        $validation = Validator::make($request->all(), ['pctype' => 'required|min:3|max:6', 'sq' => 'required',
            'Testion' => 'required',
            'cost_for_paint_pk' => 'required|numeric|min:100|max:10000000',
            'cost_ex_clear' => 'required|numeric|min:10|max:10000000',
            'cost_ex_Selar' => 'required|numeric|min:10|max:10000000',
            'cost_ex_Putty' => 'required|numeric|min:10|max:10000000',
            'cost_ex_Color' => 'required|numeric|min:10|max:10000000',
            'cost_ex_Testion' => 'required|numeric|min:10|max:10000000',
            'main_type' => 'required|numeric|min:1|max:9',
            'second_type'=>'required|numeric|min:1|max:9',
            'cost_ex_Testion' => 'required|numeric|min:10|max:10000000',
            'Selar' => 'required|numeric|min:1|max:3',
            'Putty' => 'required|numeric|min:1|max:3',
            'Color' => 'required|numeric|min:1|max:3']);
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->with('type', $request->pctype)->withInput($request->all());

        }
        $get_com = DB::table('company')->where('user_id', Auth::user()->id)->first();
        $create = DB::connection('mysql_service')->table('Company_with_paint')->insert(['clearing' => $request->clearing,
            'pctype' => $request->pctype,
            'sq' => $request->sq,
            'Testion' => $request->Testion,
            'cost_for_paint_pk' => $request->cost_for_paint_pk,
            'cost_ex_clear' => $request->cost_ex_clear,
            'cost_ex_Selar' => $request->cost_ex_Selar,
            'cost_ex_Putty' => $request->cost_ex_Putty,
            'cost_ex_Color' => $request->cost_ex_Color,
            'cost_ex_Testion' => $request->cost_ex_Testion,
            'Selar' => $request->Selar,
            'Putty' => $request->Putty,
            'Color' => $request->Color,
            'com_id' => $get_com->id,
            'main_type'=>$request->main_type,
            'second_type'=>$request->second_type,
        ]);
        Session::flash('added', 'yes');
        if($request->main_type == 1){
            $url='entra/add_form_for_paint';
        }elseif ($request->main_type == 2){
            $url='entra/add_form_for_new_build_paint';

        }else{
            $url='entra/add_form_for_other_paint';

        }

        $data=new Object();
        $data->main_type=$request->main_type;

        $data->second_type=$request->second_type;

        return redirect($url)->with('data',$data);
    }

    public function edit_form_for_paint($id)
    {
        $data = DB::connection('mysql_service')->table('Company_with_paint')->where('id', $id)->first();
        return view('user.entra.price.edit_form_for_paint', ['data' => $data]);
    }

    public function add_form_for_new_build_paint()
    {
        return view('user.entra.price.add_form_for_new_build_paint');
    }
    public function add_form_for_other_paint()
    {
        return view('user.entra.price.other');
    }
    public function edit_for_paint(Request $request, $id)
    {
        if (($request->pctype != 'normal' and $request->pctype != 'middle' and $request->pctype != 'high') or ($request->Testion != 'yes' and $request->Testion != 'no') or ($request->clearing != 'yes' and $request->clearing != 'no')) {
            return 'error';
        }
        $validation = Validator::make($request->all(), ['pctype' => 'required|min:3|max:6', 'sq' => 'required',
            'Testion' => 'required',
            'cost_for_paint_pk' => 'required|numeric|min:100|max:10000000',
            'cost_ex_clear' => 'required|numeric|min:10|max:10000000',
            'cost_ex_Selar' => 'required|numeric|min:10|max:10000000',
            'cost_ex_Putty' => 'required|numeric|min:10|max:10000000',
            'cost_ex_Color' => 'required|numeric|min:10|max:10000000',
            'cost_ex_Testion' => 'required|numeric|min:10|max:10000000',
            'Selar' => 'required|numeric|min:1|max:3',

            'Putty' => 'required|numeric|min:1|max:3',
            'Color' => 'required|numeric|min:1|max:3']);
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput($request->all());
//            return $validation->errors();
        }
        $get_com = DB::table('company')->where('user_id', Auth::user()->id)->first();
        DB::connection('mysql_service')->table('Company_with_paint')->where('id', $id)->update(['clearing' => $request->clearing,
            'pctype' => $request->pctype,
            'sq' => $request->sq,
            'Testion' => $request->Testion,
            'cost_for_paint_pk' => $request->cost_for_paint_pk,
            'cost_ex_clear' => $request->cost_ex_clear,
            'cost_ex_Selar' => $request->cost_ex_Selar,
            'cost_ex_Putty' => $request->cost_ex_Putty,
            'cost_ex_Color' => $request->cost_ex_Color,
            'cost_ex_Testion' => $request->cost_ex_Testion,
            'Selar' => $request->Selar,
            'Putty' => $request->Putty,
            'Color' => $request->Color,
            'com_id' => $get_com->id,
            'updated_at' => Carbon::now(),
        ]);
        Session::flash('edited', 'yes');
        $for_link=DB::connection('mysql_service')->table('company_with_paint')->where('id',$id)->first();
        if($for_link->main_type == 1){
            $url='entra/add_form_for_paint';
        }elseif ($for_link->main_type == 2){
            $url='entra/add_form_for_new_build_paint';
        }else{
            $url='entra/add_form_for_other_paint';
        }

        return redirect($url)->with('data',$for_link);
    }

    public function add(Request $request)
    {

        foreach ($request->all() as $key => $value) {
            $get_com_id = DB::table('company')->where('user_id', Auth::user()->id)->first();
            if (str_contains($key, 'fur')) {
                $get_only_int = substr($key, 3);//get only integer
                DB::connection('mysql_service')->table('item_prices_by_com')->insert(['third_id' => '', 'fourth_id' => $get_only_int, 'user_id' => Auth::user()->id, 'com_id' => $get_com_id->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
            } else {
                DB::connection('mysql_service')->table('item_prices_by_com')->insert(['third_id' => $key, 'fourth_id' => '', 'user_id' => Auth::user()->id, 'com_id' => $get_com_id->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);

            }
        }
        return 'fff';


    }
}
