<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusinessHub;
use App\BusinessGroup;


class BusinessHubController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
      $businesshubs = BusinessHub::all();
    #  return $businesshubs;
      return view('BusinessHub.index',compact('businesshubs'));
    }

    public function news()
    {
      $businessgroups = BusinessGroup::all();
      return view('BusinessHub.upload',compact('businessgroups'));
    }

    public function upload(Request $request)
    {

      $businessgroups = BusinessGroup::all();
      BusinessHub::create(['description'=>$request->description,'business_group_id'=>$request->business_group_id]);

      return redirect('businesshub/upload')->with('create','Successfully Created New Business Hub ');
    }

    public function edit($id)
    {
      $businessgroups = BusinessGroup::all();
      $businesshub = BusinessHub::whereId($id)->firstOrFail();
      return view('BusinessHub.edit',compact('businesshub','businessgroups'));
    }

    public function update(Request $request,$id)
    {
      BusinessHub::find($id)->update(['description'=>$request->description,'business_group_id'=>$request->business_group_id]);
      //  return redirect('businessgroup/view/'.$request->business_group_id);
      return redirect('businesshub');
    }

    public function delete($id)
    {
      BusinessHub::find($id)->delete();
      return redirect('businesshub');
    }
}
