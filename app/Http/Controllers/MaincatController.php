<?php

namespace App\Http\Controllers;

use App\Maincat;
use Illuminate\Support\Facades\Validator;

use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Http\Request;

class MaincatController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $cats = Maincat::all();
        return view('admin.maincategory', compact('cats'));
    }

    public function add()
    {
        return view('admin.add_maincat');
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
           'name' => 'required|min:3|max:100',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else
        {
            Maincat::create(['name' => $request->name]);

            return redirect('maincategory')->with('add', 'New Main Categroy has been added!');
        }
    }

    public function delete($id)
    {
        Maincat::find($id)->delete();

        return redirect('maincategory')->with('delete', 'Delete Successfully!');
    }

    public function edit($id)
    {
        $cats = Maincat::whereId($id)->firstOrFail();

        return view('admin.edit_maincat', compact('cats'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required|min:3|max:100',
            ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else
        {
            Maincat::find($id)->update(['name' => $request->name]);

            return redirect('maincategory')->with('upadate', 'New Main Categroy has been updated!');
        }
    }
}
