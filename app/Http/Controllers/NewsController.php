<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Adminuser;
use App\News;
use App\NewsCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $news = News::all();
        return view('News.index',compact('news'));
    }

    public function view($id)
    {
        $news = News::whereId($id)->firstOrFail();

        return view('News.view',compact('news'));
    }

    public function upload()
    {
        $newsCategories = NewsCategory::all();


        if(sizeof($newsCategories)==0)

            return redirect(url('newsCategory/upload'))->with('create','Please create category first');

        else {
            return view('News.upload',compact('newsCategories'));
        }
    }

    public function save(Request $request)
    {

        $op = Auth::guard('admin')->user()->id;

        $file = $request->file('file');

        $file_name = uniqid().'_'.$file->getClientOriginalName();

        $file->move(public_path().'/upload/',$file_name);

        News::create([
            'role' => Auth::guard('admin')->user()->role,
            'op_id' => $op,
            'title'=>$request->title,
            'des'=>$request->des,
            'image'=>$file_name,
            'NewsCategory_id'=>$request->newscategory
        ]);

        DB::table('op_edit')->insert(['op_id' => Auth::guard('admin')->user()->id, 'edit_id' => 0, 'status' => 'add', 'main' => 'news','role'=>Auth::guard('admin')->user()->role]);

        return redirect('news')->with('add','New Article Uploaded..!');
    }

    public function delete($id)
    {
        $name = News::whereId($id)->first()->title;

        DB::table('op_edit')->insert([
            'role' => Auth::guard('admin')->user()->role,
            'op_id' => Auth::guard('admin')->user()->id,
            'edit_id' => $id,
            'title' => $name,
            'status' => 'delete',
            'main' => 'news'
        ]);

        News::find($id)->delete();

        return redirect('news')->with('delete','Article Deleted Successfully..!');
    }

    public function edit($id)
    {
        $newsCategories = NewsCategory::all();

        $news = News::whereId($id)->firstOrFail();

        return view('News.edit',compact('news','newsCategories'));

    }

    public function update(Request $request,$id)
    {
        DB::table('op_edit')->insert([
            'role' => Auth::guard('admin')->user()->role,
            'op_id' => Auth::guard('admin')->user()->id,
            'edit_id' => $id,
            'status' => 'update',
            'main' => 'news'
        ]);

        $file = $request->file;

        if($file == NULL)
        {
            News::find($id)->update([
                'op_id' => Auth::guard('admin')->user()->id,
                'title'=>$request->title,
                'des'=>$request->des,
                'NewsCategory_id'=>$request->newscategory
            ]);
        }
        else
        {
            $file = $request->file('file');

            $file_name = uniqid().'_'.$file->getClientOriginalName();

            $file->move(public_path().'/upload/',$file_name);

            News::find($id)->update([
                'op_id' => Auth::guard('admin')->user()->id,
                'title'=>$request->title,
                'des'=>$request->des,
                'NewsCategory_id'=>$request->newscategory,
                'image'=>$file_name
            ]);

        }

        return redirect ('news')->with('update','Article Updated..!');

    }

}
