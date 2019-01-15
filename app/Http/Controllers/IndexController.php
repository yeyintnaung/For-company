<?php

namespace App\Http\Controllers;

use App\Adminuser;
use App\Events;
use App\Tender;
use App\User;
use Illuminate\Http\Request;
use App\News;
use Illuminate\Support\Facades\Event;


class IndexController extends Controller
{
    public function __construct()
    {

        $this->middleware('admin');


    }

    public function index()
    {
        $users = User::all();
        $news = News::all();
        $tender = Tender::all();
        $events =Events::all();

        return view('adminIndex', compact('users', 'news','tender','events'));
    }

}
