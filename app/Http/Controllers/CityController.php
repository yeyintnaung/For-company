<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Country;

class CityController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');

    }
    public function index()
    {
      $cities = City::all();

      return  view('City.index',compact('cities'));

    }

    public function upload()
    {
      $countries = Country::all();

      return view('City.upload',compact('countries'));

    }

    public function save(Request $request)
    {
      City::create(['name'=>$request->name,'state_id'=>$request->state_id]);
      return redirect('cities')->with('create','New City Created Successfully');
    }

    public function edit($id)
    {
      $city = City::find($id)->firstOrFail();
      $countries = Country::all();
      return view('City.edit',compact('city','countries'));
    }

    public function update(Request $request,$id)
    {
      City::find($id)->update(['name'=>$request->name,'state_id'=>$request->state_id]);
      return redirect('cities')->with('update','Successfully Updated ...');
    }

    public function delete($id)
    {
      City::find($id)->delete();
      return redirect('cities')->with('delete','Successfully Deleted ...');
    }
}
