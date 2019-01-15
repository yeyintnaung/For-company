<?php

namespace App\Http\Controllers;

use App\Construct;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Http\Request;

class ConstructController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $constructs = Construct::all();
        return view('admin.construct', compact('constructs'));
    }

    public function add()
    {
        return view('admin.construct_add');
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required|min:3|max:100'
            ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else
        {
            Construct::create(['name' => $request->name]);
            return redirect('construct')->with('add', 'Construct Add!');
        }
    }

    public function delete($id)
    {
        Construct::find($id)->delete();
        return redirect('construct')->with('delete', 'Construct Delete!');
    }

    public function edit($id)
    {
        $construct = Construct::whereId($id)->first();
        return view('admin.construct_edit', compact('construct'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required|min:3|max:100'
            ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else
        {
            Construct::whredId($id)->update(['name' => $request->name]);
            return redirect('construct')->with('update', 'Update Construct');
        }
    }
    public function get_project_form(){
     return view('construct_project.get_project_form');
    }
    public function get_project(Request $request){

        switch ($request->business_id) {
            case 1 :
                $fr = ['fr4','rb4'];
                break;
            case 2:
                $fr = ['fr3','rb3'];
                break;
            case 3:
                $fr = ['fr5','fr5'];
                break;
            case 4:
                $fr = ['fr1','rb2'];
                break;
            case 5:
                $fr = ['fr7','fr7'];
                break;

            case 6:
                $fr = ['fr8','rb5'];
                break;

            case 7:
                $fr = ['fn1','fn2','fn3','fn4'];
                break;

            case 8:
                $fr = ['fr6','fn2','fn3','fn4'];
                break;
            case 9:
                $fr = ['rb1','b1','b2','b3'];
                break;
            case 10:
                $fr = ['fr8','rb5'];
                break;

        }
        $data = DB::connection('mysql_service')->table('for_repair')->where([['city', '=', $request->city_id], ['close', 0], ['confirm', '=', 'confirmed']])->whereIn('fr_type',$fr)->orderBy('created_at','desc')->get();


        return view('construct_project.get_projects',['data'=>$data]);



    }

}
