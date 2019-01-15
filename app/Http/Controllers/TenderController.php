<?php

namespace App\Http\Controllers;

use App\Tender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TenderController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('admin');


    }

    public function index()
    {
        $tenders = Tender::all();
        return view('tenders.index', compact('tenders'));
    }

    public function view($id)
    {
        $tenders = Tender::whereId($id)->first();

        return view('tenders.view', compact('tenders'));
    }

    public function upload()
    {
        return view('tenders.upload');
    }

    public function save(Request $request)
    {
        $file = $request->file('photo');

        $file_name = uniqid() . '_' . $file->getClientOriginalName();

        $file->move(public_path() . '/upload/tenders/', $file_name);

        // dd($file_name);

        Tender::create([
            'op_id' => Auth::guard('admin')->user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'photo' => $file_name,
            'business_hub_id' => $request->business_hub_id,
            'td_point' => $request->td_point
        ]);

        DB::table('op_edit')->insert([
            'role' => Auth::guard('admin')->user()->role,
            'op_id' => Auth::guard('admin')->user()->id,
            'edit_id' => 0,
            'status' => 'add',
            'main' => 'tender',
        ]);

        return redirect('tenders')->with('add', 'New Article Uploaded..!');
    }

    public function delete($id)
    {
        $title = Tender::whereId($id)->first()->title;
        DB::table('op_edit')->insert([
            'role' => Auth::guard('admin')->user()->role,
            'op_id' => Auth::guard('admin')->user()->id,
            'edit_id' => $id,
            'title' => $title,
            'status' => 'delete',
            'main' => 'tender'
        ]);

        Tender::find($id)->delete();

        return redirect('tenders')->with('delete', 'Article Deleted Successfully..!');
    }

    public function edit($id)
    {

        $tenders = Tender::whereId($id)->firstOrFail();

        return view('tenders.edit', compact('tenders'));

    }

    public function update(Request $request, $id)
    {
        $file = $request->photo;

        if ($file == NULL) {
            Tender::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'business_hub_id' => $request->business_hub_id,
                'td_point' => $request->td_point

            ]);

        } else {
            $file = $request->file('photo');

            $file_name = uniqid() . '_' . $file->getClientOriginalName();

            $file->move(public_path() . '/upload/tenders/', $file_name);

            Tender::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'photo' => $file_name,
                'business_hub_id' => $request->business_hub_id,
                'td_point' => $request->td_point

            ]);
        }

        DB::table('op_edit')->insert([
            'role' => Auth::guard('admin')->user()->role,
            'op_id' => Auth::guard('admin')->user()->id,
            'edit_id' => $id,
            'status' => 'update',
            'main' => 'tender'
        ]);

        return redirect('tenders')->with('update', 'Article Updated..!');

    }
}
