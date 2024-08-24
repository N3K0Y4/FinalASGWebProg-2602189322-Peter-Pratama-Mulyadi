<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function view_home()
    {
        return view('page.home');
    }
}
