<?php

namespace App\Http\Controllers;

use Validator;

use App\Showcase;

use App\Company;

use App\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;


class ShowcaseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
                $this->middleware('block');

    }

    public  function index()
    {
    
        $pro = Showcase::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(6);

        return view('showcase.index', ['products' => $pro]);
    }

    public function add()
    {
        return view('showcase.add');
    }

    public function save(Request $request)
    {
        $validator=  Validator::make($request->all(), [
            'name' => 'required|min:3|max:24',
            'photo' => 'required|mimetypes:image',
            'description' => 'required|min:6|max:2000',
            'photo' => 'required|mimetypes:image/jpeg,image/png,image/jpg,image/gif,image/svg|max:5000',

        ],['photo.mimetypes'=>'The :attribute must be photo.']);

        if($validator->fails())
        {
            return redirect('show_case/add')->withErrors($validator);
        }
        else
        {
            $photo = $request->file('photo');
            $photo_name = uniqid().'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path().'/upload/', $photo_name);

            $user_id = Auth::user()->id;
            Showcase::create(['user_id' => $user_id, 'name' => $request->name, 'photo' => $photo_name, 'description' => $request->description]);

            return redirect('show_case')->with('add', 'Your product has been added.');
        }
    }

    public function delete($id)
    {
        Showcase::find($id)->delete();

        return redirect('show_case')->with('delete', 'Your product detail has been deleted!');
    }

    public function edit($id)
    {
        $product = Showcase::whereId($id)->first();
        return view('showcase.edit', compact('product'));
    }

    public function update($id, Request $request)
    {
        $photo = $request->photo;

        $validator=  Validator::make($request->all(), [
            'name' => 'required|min:3|max:16',
            'description' => 'required|min:6|max:2000',
            'photo' => 'mimetypes:image/jpeg,image/png,image/jpg,image/gif,image/svg|max:5000',


        ],['photo.mimetypes'=>'The :attribute must be photo.']);

        if($validator->fails())
        {
            return redirect('show_case/edit/'.$id)->withErrors($validator);
        }
        else
        {
            if ($photo == '')
            {
                Showcase::find($id)->update(['name' => $request->name, 'description' => $request->description]);
            }
            else
            {
                $photo = $request->file('photo');

                $photo_name = uniqid() . '.' . $photo->getClientOriginalExtension();

                $photo->move(public_path() . '/upload/', $photo_name);

                Showcase::find($id)->update(['name' => $request->name, 'photo' => $photo_name, 'description' => $request->description]);
            }

            return redirect('show_case')->with('update', 'Your Product detail has been updated!');
        }
    }

    public function others($user_id)
    {
        $products = Showcase::where('user_id', $user_id)->orderBy('created_at', 'desc')->paginate(6);

        return view('showcase.others', ['products' => $products]);
    }
}
