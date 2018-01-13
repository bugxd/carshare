<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Image;
use Auth;

class UploadController extends Controller
{
    public function userPicUpload()
    {
        return view('infos.profile');
    }

    public function updateAvatar(Request $request)
    {
        if($request->hasFile('avatar')){
            $user = Auth::user();
            $avatar = $request->file('avatar');
            $filename = time()."user_$user->id.". $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save(public_path('/storage/userIMG/' .$filename));

            $user->avatar = $filename;
            $user->save();

        }
        return view('infos/profile', array('user' => Auth::user()));

    }
}
