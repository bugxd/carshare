<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Image;
use Auth;
use App\Car;
use App\Picture;

class UploadController extends Controller
{
    /**
     * middleware auth so that only logged Users can upload images
     * UploadController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userPicUpload()
    {
        return redirect()->route('/profile', 'ProfileController@showProfile');
    }

    /**
     * Function to change avatar pic from User
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function updateAvatar(Request $request)
    {
        $this->validate($request, [
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($request->hasFile('avatar')){
            $user = Auth::user();
            $avatar = $request->file('avatar');
            $filename = "user_$user->id.". $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save(public_path('/storage/userIMG/' .$filename));

            $user->avatar = $filename;
            $user->save();

        }

        return redirect()->route('profile');

    }

    public function dropzone(Car $car)
    {
        return view('cars/addCarIMG',['car'=>$car]);
    }

    /**
     * Function to upload Car Pic with dropzone (D&D)
     * @param Request $request
     * @param Car $car
     */
    public function updateCarIMG(Request $request,Car $car)
    {
        $car = Car::find($car->id);
        $user = Auth::user();
        $image = $request->file('file');
        $filename = "car_".$user->id."_".str_random(10).".".$image->getClientOriginalExtension();

        Image::make($image)->resize(400,400)->save(public_path('/storage/carIMG/' .$filename));


        $pictures = Picture::create([
            'imgName' => $filename,
            'car_id' => $car->id
        ]);



    }



}
