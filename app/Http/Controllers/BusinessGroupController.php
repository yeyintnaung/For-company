<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusinessGroup;
use App\BusinessHub;

class BusinessGroupController extends Controller
{
    public function __construct()
    {

        $this->middleware('admin');


    }
    public function index()
    {
      $businessgroups = BusinessGroup::all();
      return view('BusinessGroup.index',compact('businessgroups'));
    }



    public function upload(Request $request)
    {
      BusinessGroup::create(['name'=>$request->name]);

      return redirect('businessgroup/upload')->with('create','Successfully Created New Business Group');
    }

    public function delete($id)
    {
      BusinessGroup::find($id)->delete();
      return redirect('businessgroup');
    }

    public function edit($id)
    {
      $businessgroup = BusinessGroup::whereId($id)->firstOrFail();
      return view('BusinessGroup.edit',compact('businessgroup'));
    }

    public function update(Request $request,$id)
    {
      BusinessGroup::find($id)->update(['name'=>$request->name]);
      return redirect('businessgroup')->with('update','Successfully Updated');
    }

    public function view($id)
    {
      $businesshubs = BusinessHub::all();
      return view('BusinessGroup.view',compact('businesshubs','id'));
    }
}
