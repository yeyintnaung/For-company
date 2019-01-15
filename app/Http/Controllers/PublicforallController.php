<?php

namespace App\Http\Controllers;

use App\Tender;
use Illuminate\Http\Request;

class PublicforallController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
                $this->middleware('block');



    }
    public function tenders()
    {
        $tenders = Tender::orderBy('id', 'desc')->get();
        return $tenders;
    }

}
