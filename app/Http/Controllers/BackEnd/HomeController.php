<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class HomeController extends BackEnd
{
    public function index()
    {
        return view('back-end.home');
    }
}
