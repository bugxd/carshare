<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarController extends Controller
{
    //
    /**
     * Show the profile for the given car.
     *
     * @return Response
     */
    public function show()
    {
        return view('car.showcar');
    }

    public function store(Request $request){
        $car = Car::create($request->all());
        return redirect()->route('home');
    }
}
