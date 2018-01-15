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
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function userPicUpload()
    {
        return view('infos.profile');
    }

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
        return view('infos/profile', array('user' => Auth::user()));

    }

    public function updateCarIMG(Request $request)
    {

        $user = Auth::user();
        $image = $request->file('file');
        $filename = "car_$user->id.".$image->getClientOriginalName();

        Image::make($image)->resize(400,400)->save(public_path('/storage/carIMG/' .$filename));


        $pictures = Picture::insert(['imgName' => $filename,
            'car_id' => Car::all()->random()->id,]);


        }



}
