<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewsCategory;

class NewsCategoryController extends Controller
{
    public function __construct()
    {

        $this->middleware('admin');


    }
    public function index()
    {
      $newsCategories = NewsCategory::all();

      return view('NewsCategory.index',compact('newsCategories'));

    }

    public function upload(Request $request)
    {
      NewsCategory::create(['description'=>$request->description]);

      return redirect(url('newsCategory'))->with('create','New Category created ..!');
    }

    public function edit($id)
    {


      $newsCategory = NewsCategory::whereId($id)->firstOrFail();

      return view('NewsCategory.edit',compact('newsCategory'));
    }

    public function save(Request $request,$id)
    {
        NewsCategory::find($id)->update(['description'=>$request->description]);

        return redirect('newsCategory')->with('update','Category updated ..!');
    }

    public function delete($id)
    {
      NewsCategory::find($id)->delete();
      return redirect('newsCategory')->with('delete','Category deleted ..!');
    }
}
