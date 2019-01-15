<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;


class BlockUserController extends Controller
{
    public function blockPage()
    {
        return view('auth.block');
    }
}
