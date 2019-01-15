<?php

namespace App\Http\Controllers;

use App\Adminuser;
use App\FirstWork;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class OperationController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $data = Adminuser::all();

        return view('operation.index', compact('data'));
    }

    public function view($id)
    {
        $data = DB::table('op_edit')->where('op_id', $id)->get();

        return view('operation.view', compact('data'));
    }

    public function add()
    {
        return view('operation.add');
    }

    public function first_work_form()
    {
        return view('for_op.works.first_work');
    }

    public function first_work_list()
    {
        $data = FirstWork::all();
        return view('for_op.works.first_work_list', ['data' => $data]);
    }

    public function first_work(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        FirstWork::create(['name' => $request->name]);
        return redirect('operation/first_work_list');

    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:6|max:100',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|max:255|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Adminuser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'op',
            'permission' => 'true',
        ]);

        return redirect('operation')->with('add', 'Add Success!');
    }

    public function delete($id)
    {
        Adminuser::find($id)->delete();

        return redirect('/operation')->with('delete', 'One operation member had been deleted!');
    }

    public function edit($id)
    {
        $data = Adminuser::whereId($id)->first();

        return view('operation.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:6|max:100',
            'email' => 'required|email|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Adminuser::whereId($id)->update(['name' => $request->name, 'email' => $request->email]);

        return redirect('/operation')->with('update', 'Update Success!');
    }
}
