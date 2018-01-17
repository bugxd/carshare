<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class InfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showFAQ()
    {
        return view('infos/faq');
    }

    public function showLendCar()
    {
        return view('infos/lendCar');
    }

    public function showRentCar()
    {
        return view('infos/rentCar');
    }

    public function showAbout()
    {
        return view('infos/about');
    }

    public function showAGB()
    {
        return view('infos/agb');
    }
}
