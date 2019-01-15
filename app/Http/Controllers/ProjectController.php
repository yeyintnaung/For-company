<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProjectController extends Controller
{
   //dashboard
       public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $project = DB::connection('mysql_service')
            ->table('for_repair')
            ->orderBy('id','desc')
            ->get();
        $company = DB::table('company')
            ->orderBy('id','desc')
            ->get();
        $confirmed = DB::connection('mysql_service')
            ->table('for_repair')
            ->where([['confirm', '=', 'confirmed']])
            ->orderBy('id','desc')
            ->get();
        $pending = DB::connection('mysql_service')
            ->table('for_repair')
            ->where([['confirm', '=', 'pending']])
            ->orderBy('id','desc')
            ->get();
      return view('projects.dashboard',['project' => $project, 'confirmed' => $confirmed, 'pending' => $pending, 'company' => $company]);
    }
    //all projects
   public function show_all_projects()
   {
       $data = DB::connection('mysql_service')
           ->table('for_repair')
           ->orderBy('id','desc')
           ->get();
       return view('projects.show_all_projects', compact('data'));
   }
    public function projects_by_month($id)
    {
        $detail =DB::connection('mysql_service')
            ->table('for_repair')
            ->whereMonth('created_at', $id)
            ->get();
        return view('projects.show_monthly_projects', compact('detail'));
    }
    public function projects_detail($id)
    {
        $detail = DB::connection('mysql_service')
            ->table('for_repair')
            ->where('id', $id)
            ->first();

        $req_com = DB::connection('mysql_service')
            ->table('request')
            ->where([['post_id', '=', $id]])
            ->get(); 
        return view('projects.projects_detail', compact('detail','req_com'));
    }
    //confirmed projects
    public function confirmed_projects()
    {
        return view('projects.show_all_confirmed_projects');
    }
    public function projects_confirmed_detail($id)
    {
        $detail = DB::connection('mysql_service')
            ->table('for_repair')
            ->where('id', $id)
            ->first();

            $req_com = DB::connection('mysql_service')
            ->table('request')
            ->where([['post_id', '=', $id]])
            ->get(); 
        return view('projects.projects_confirmed_detail', compact('detail','req_com'));
    }
        public function confirmed_projects_by_month($id)
    {
        $detail =DB::connection('mysql_service')
            ->table('for_repair')
            ->where([['confirm', '=', 'confirmed']])
            ->whereMonth('created_at', $id)
            ->get();
        return view('projects.show_monthly_confirmed_projects', compact('detail'));
    }
    //pending projects
    public function pending_projects()
    {
        return view('projects.show_all_pending_projects');
    }

    public function projects_pending_detail($id)
    {
        $detail = DB::connection('mysql_service')
            ->table('for_repair')
            ->where('id', $id)
            ->first();

            $req_com = DB::connection('mysql_service')
            ->table('request')
            ->where([['post_id', '=', $id]])
            ->get(); 
        return view('projects.projects_pending_detail', compact('detail','req_com'));
    }
    public function pending_projects_by_month($id)
    {
        $detail =DB::connection('mysql_service')
            ->table('for_repair')
            ->where([['confirm', '=', 'pending']])
            ->whereMonth('created_at', $id)
            ->get();
        return view('projects.show_monthly_pending_projects', compact('detail'));
    }



}