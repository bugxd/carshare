<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Car $car)
    {
        $this->validate($request, [
            'rent_from' => 'required | date_format:"Y-m-d"|after:"2018-02-01"',
            'rent_to' => 'required | date_format:"Y-m-d"|after:rent_from'
        ]);
        if(Auth::check()) {

            $car = Car::find($request->car_id);
            $start = $car->available_from;
            $end = $car->available_to;

            $startnew = $request->input('rent_from');
            $endnew = $request->input('rent_to');

            if ($startnew >= $start && $endnew <= $end) {

                $rent = Reservation::create([

                    'rent_from' => $request->input('rent_from'),
                    'rent_to' => $request->input('rent_to'),

                    'user_id' => Auth::user()->id,
                    'car_id' => $request->input('car_id')
                ]);

                if ($rent) {
                    //redirect to upload images
                    return redirect()->route('profile')->with('success', 'Auto wurde reserviert');
                    //return redirect()->route('cars.show',['car'=>$car])->with('success','Auto wurde erfolgreich erstellt');
                }

                return back()->withInput()->with('error', 'Es ist ein Fehler aufgetreten');
            }
            return back()->withInput()->with('success', 'Auto in diesem Zeitraum nicht verfügbar!');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
