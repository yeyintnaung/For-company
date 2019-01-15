<?php

namespace App\Http\Controllers;

use App\Events;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index(){
        $events = Events::all();
        return view('events.index',compact('events'));

    }
    public function upload(){
        return view('events.upload');
    }

    public function save(Request $request)
    {
        $input=$request->except('_token');
        if(!empty($request->file('photo'))){
            $file = $request->file('photo');

            $file_name = uniqid().'_'.$file->getClientOriginalName();

            $file->move(public_path().'/upload/events/',$file_name);

        }
        $input['photo']=$file_name;
        Events::create($input);

        return redirect('events')->with('upload','Successfully Created New Event');
    }
    public function update(Request $request )
    {
        $id=$request->id;
        $file=$request->file('photo');
        if($file == NULL)
        {
            Events::find($id)->update(['title'=>$request->title,'description'=>$request->description,'business_hub_id'=>$request->business_hub_id,'start_date'=>$request->start_date,'end_date'=>$request->end_date]);

        }
        else
        {
            $file = $request->file('photo');

            $file_name = uniqid().'_'.$file->getClientOriginalName();

            $file->move(public_path().'/upload/events/',$file_name);
            Events::find($id)->update(['title'=>$request->title,'description'=>$request->description,'start_date'=>$request->start_date,'end_date'=>$request->end_date,'photo'=>$file_name]);




        }
        return redirect ('events')->with('update','Article Updated..!');
    }

    public function delete($id)
    {
        Events::find($id)->delete();
        return redirect('events');
    }

    public function edit($id)
    {
        $events = Events::whereId($id)->firstOrFail();
        return view('events.edit',compact('events'));
    }
    public function view($id)
    {
        $events = Events::whereId($id)->firstOrFail();
        return view('events.view',compact('events'));
    }
}
