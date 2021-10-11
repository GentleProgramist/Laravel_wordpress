<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function index2()
    {
        return view('index-style-2');
    }
    public function privacy()
    {
        return view('privacy');
    }
    public function terms()
    {
        return view('terms');
    }
    public function tcf()
    {
        return view('tcf');
    }
    public function apply()
    {
        return view('privacy');
    }

}
