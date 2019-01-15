<?php

namespace App\Http\Controllers;

use App\Design;
use Validator;
use Illuminate\Http\Request;

class DesignController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $designs = Design::all();

        return view('admin.design', compact('designs'));
    }

    public function add()
    {
        return view('admin.design_add');
    }

    public function save(Request $request)
    {
        $validtor = Validator::make($request->all(),
            [
                'name' => 'required|min:3|max:255'
            ]);

        if($validtor->fails())
        {
            return redirect()->back()->withErrors($validtor)->withInput();
        }
        else
        {
            $designs = Design::create(['name' => $request->name]);

            return redirect('design')->with('add', 'Added Design!');
        }
    }

    public function delete($id)
    {
        Design::find($id)->delete();
        return redirect('design')->with('delete', 'Delete Successfully!');
    }

    public function edit($id)
    {
        $design = Design::whereId($id)->first();
        return view('admin.design_edit', compact('design'));
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
            Design::whereId($id)->update(['name' => $request->name]);

            return redirect('design')->with('update', 'Update Design!');
        }
    }
}
