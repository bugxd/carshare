<?php

namespace App\Http\Controllers;

use App\Car;
use App\Picture;
use Illuminate\Support\Facades\Auth;
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
        return view('cars.create');
    }

    /**
     * Sorte a newly created car in database
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request){
        if(Auth::check()){
            $car = Car::create([
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
                'animal_allowed' => $request->has('animal_allowed'),
                'smoking_allowed' => $request->has('smoking_allowed'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'available_from' => $request->input('available_from'),
                'available_to' => $request->input('available_to'),
                'lat' => str_replace(',','.',$request->input('lat')),
                'lng' => str_replace(',','.',$request->input('lng')),
                'user_id' => Auth::user()->id
            ]);

            if($car){
                return redirect()->route('cars.show',['car'=>$car])->with('success','Auto wurde erfolgreich erstellt');
            }

            return back()->withInput()->with('error','Es ist ein Fehler aufgetreten');
        }
    }

    /**
     * Display the specified car
     *
     * @param Car $car
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Car $car){
        $car = Car::find($car->id);
        $pictures = Picture::where('car_id',$car->id)->get();
        return view('cars.show',['car'=>$car])->with('pictures',$pictures);
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
     * @return \Illuminate\Http\RedirectResponse
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
            'animal_allowed' => $request->has('animal_allowed'),
            'smoking_allowed' => $request->has('smoking_allowed'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'lat' => str_replace(',','.',$request->input('lat')),
            'lng' => str_replace(',','.',$request->input('lng')),
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Car $car){
        if(Auth::check()) {
            $findCar = Car::find($car->id);
            if ($findCar->delete()) {
                return redirect()->route('profile')->with('success', 'Auto gelöscht');
            }

            return back()->withInput()->with('error', 'Auto konnte nicht gelöscht werden');
        }
    }
}
