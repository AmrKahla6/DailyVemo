<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\User;

class HomeController extends BackEnd
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }// end of __constract child function

    public function index()
    {
        return view('back-end.home');
    }
}
