<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    //
    /**
     * Show all cars
     *
     * @return Response
     */
    public function index()
    {
        $cars = Car::all();
        return view('cars.index', ['cars' => $cars]);
    }

    /**
     * Show the form for creating a new car
     *
     */
    public function create(){

    }

    /**
     * Sorte a newly created car in database
     *
     * @param Request $request
     */
    public function store(Request $request){

    }

    /**
     * Display the specified car
     *
     * @param Car $car
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Car $car){
        $car = Car::find($car->id);

        return view('cars.show',['car'=>$car]);
    }

    /**
     * Show the form for editing a new car
     *
     * @param Car $car
     */
    public function edit(Car $car){

    }

    /**
     * Updated the spiecified car in database
     * @param Request $request
     * @param Car $car
     */
    public function update(Request $request, Car $car){

    }

    /**
     * Remove the car from the database
     * @param Car $car
     */
    public function destroy(Car $car){

    }
}
