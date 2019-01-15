<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class AjaxGetController extends Controller
{
    //
    public function get_cities_ajax($id)
    {

        $states = DB::table('states')->where('country_id', $id)->get();
        foreach ($states as $s) {
            $cities=DB::table('cities')->where('state_id', $s->id)->get();
            foreach($cities as $city){
                $data[]=$city;
            }

        }
       return Response::json(['data'=>$data]);
    }

}
