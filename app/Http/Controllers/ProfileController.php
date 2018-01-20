<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input as input;
use App\User;
use App\Car;
use App\Picture;
use Auth;
use Hash;

class ProfileController extends Controller
{
    /**
     * middleware auth so that only logged Users can view your profile
     * ProfileController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * show User Profile
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     */
    public function showProfile()
    {
        $cars = Car::where('user_id', Auth::user()->id)->get();
        $pictures = Picture::get();
        return view('infos/profile')->with('cars', $cars)->with('pictures',$pictures);
    }

    /**
     * Edit User Profile
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editProfile()
    {
        return view('infos/profileEdit', array('user' => Auth::user()));
    }

    /**
     * Change the Lastname from User
     * @return \Illuminate\Http\RedirectResponse|string
     */
    public function changeLname()
    {

        $User = User::find(Auth::user()->id);

        if($User->last_name = Input::get('last_name')) {


            $User->save();
            return back();
        }

        return "not working";
    }

    /**
     * Change the firstname from User
     * @return \Illuminate\Http\RedirectResponse|string
     */
    public function changeFname()
    {

        $User = User::find(Auth::user()->id);

        if ($User->first_name = Input::get('first_name')) {


            $User->save();
            return back();
        }

        return "not working";
    }

    /**
     * Function to change User Password
     * @return \Illuminate\Http\RedirectResponse|string
     */
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
