<?php

namespace App\Http\Controllers;

use App\Car;
use \App\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::with('pictures')->get();

        return view('welcome', ['cars' => $cars]);
    }

    /**
     * Generate Image upload View
     *
     * @return void
     */
    public function dropzone()
    {
        return view('cars/addCarIMG');
    }

}
