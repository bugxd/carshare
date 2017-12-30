<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function userPicUpload()
    {
        return view('infos.profil');
    }

    public function storeUserPic(Request $request)
    {
        if($request->hasFile('image')){
            $request->file('image');
            return Storage::putFile('userIMG', $request->file('image'));
        } else {
            return 'Kein Bild gewählt';
        }
    }
}
