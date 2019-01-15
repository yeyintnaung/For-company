<?php

namespace App\Http\Controllers;

use App\FreePlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FreePlanController extends Controller
{
    function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $data = FreePlan::all();

        return view('freePlan.index', compact('data'));
    }

    public function add()
    {
        return view('freePlan.add');
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|min:1|max:100',
            'increase' => 'required|max:255|min:1',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }

        FreePlan::create([
            'amount' => $request->amount,
            'increase' => $request->increase,
        ]);

        return redirect('free_plan')->with('add', 'Add Free Plan!');
    }

    public function edit($id)
    {
        $data = FreePlan::whereid($id)->first();
        return view('freePlan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|min:1|max:100',
            'increase' => 'required|max:255|min:1',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }

        FreePlan::find($id)->update(['amount' => $request->amount, 'increase' => $request->increase]);

        return redirect('free_plan')->with('update', 'Update Successfully!');
    }
}
