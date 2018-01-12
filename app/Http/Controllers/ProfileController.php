<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input as input;
use App\User;
use App\Car;
use Auth;
use Hash;

class ProfileController extends Controller
{

    public function index()
    {
        $cars = Car::all();
    }

    public function showProfile(Car $car)
    {

        $car = Car::find($car ->user_id);
        return view('infos/profile2', array('user' => Auth::user(), 'cars' => $car ));
    }

    public function editProfile()
    {
        return view('infos/profile', array('user' => Auth::user()));
    }

    public function changeLname()
    {

        $User = User::find(Auth::user()->id);

        if($User->last_name = Input::get('last_name')) {


            $User->save();
            return back();
        }

        return "not working";
    }

    public function changeFname()
    {

        $User = User::find(Auth::user()->id);

        if ($User->first_name = Input::get('first_name')) {


            $User->save();
            return back();
        }

        return "not working";
    }

    public function changePW()
    {

        $User = User::find(Auth::user()->id);

        if (Hash::check(Input::get('passwordold'), $User['password']) && Input::get('password') == Input::get('password_confirmation')) {
            $User->password = bcrypt(Input::get('password'));
            $User->save();
            return back();
        }
        return "not working";
    }

}
