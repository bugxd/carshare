<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InfoController extends Controller
{
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

    public function showProfil()
    {
        return view('infos/profil');
    }
}
