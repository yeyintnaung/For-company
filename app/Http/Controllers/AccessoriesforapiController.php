<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AccessoriesforapiController extends Controller
{
    //get and to put logo image from api server
    public function copy_photo_from_api(Request $request){
        $phot= $request->file;
        Storage::disk('public')->put($request->name,$phot);
        return 'nice';
    }
    //end get and to put logo

}
