<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InfoController extends Controller
{
    public function index()
    {
        return view('infos/faq');
    }

    public function index1()
    {
        return view('infos/lendCar');
    }

    public function index2()
    {
        return view('infos/rentCar');
    }

    public function index3()
    {
        return view('infos/about');
    }

    public function index4()
    {
        return view('infos/agb');
    }
}
