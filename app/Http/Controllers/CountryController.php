<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;

class CountryController extends Controller
{
    public function __construct()
    {

        $this->middleware('admin');


    }
    public function index()
    {
      $datas = Country::all();

      return view('Country.index',compact('datas'));

    }

    public function upload(Request $request)
    {
      Country::create(['name'=>$request->name]);
      return redirect('countries/upload')->with('create','Country Created Successfully..!');
    }

    public function edit($id)
    {
      $country = Country::whereId($id)->firstOrFail();
      return view('Country.edit',compact('country'));
    }

    public function update(Request $request,$id)
    {
      Country::find($id)->update(['name'=>$request->name]);

      return redirect('countries')->with('update','Country Updated Successfully..!');

    }

    public function delete($id)
    {
      Country::find($id)->delete();
      return redirect('countries');

    }
}
