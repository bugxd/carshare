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
     * Display the form for editing a new car
     *
     * @param Car $car
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Car $car){
        $car = Car::find($car->id);

        return view('cars.edit',['car'=>$car]);
    }

    /**
     * Updated the spiecified car in database
     * @param Request $request
     * @param Car $car
     */
    public function update(Request $request, Car $car){
        //save data
        $carUpdate = Car::where('id',$car->id)->update([
            'brand' => $request->input('brand'),
            'car_type' => $request->input('car_type'),
            'color' => $request->input('color'),
            'licence_plate' => $request->input('licence_plate'),
            'nr_of_seats' => $request->input('nr_of_seats'),
            'weight' => $request->input('weight'),
            'capacity' => $request->input('capacity'),
            'power' => $request->input('power'),
            'design_speed' => $request->input('design_speed'),
            'payload' => $request->input('payload'),
            'vertical_load' => $request->input('vertical_load'),
            'axe_load' => $request->input('axe_load'),
            'animal_allowed' => $request->get('animal_allowed'),
            'smoking_allowed' => $request->get('smoking_allowed'),
            'description' => $request->input('description'),
            'price' => $request->input('price')
            //'position' => $request->input('brand'),
            //'user_id'

        ]);

        if($carUpdate){
            return redirect()->route('cars.show',['car'=>$car])
                ->with('success','Car updated successfully!');
        }
        //redirect
        //if fails
        return back()->withInput();
    }

    /**
     * Remove the car from the database
     * @param Car $car
     */
    public function destroy(Car $car){

    }
}
