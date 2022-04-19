<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        return view('public.views.homepage');
    }

    public function type($slug)
    {
        # code...
    }

    public function prductDetail($code)
    {
        # code...
    }
}
