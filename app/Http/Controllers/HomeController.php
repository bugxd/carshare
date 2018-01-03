<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Generate Image upload View
     *
     * @return void
     */
    public function dropzone()
    {
        return view('cars/addCarIMG');
    }

    /**
     * Image Upload Code
     *
     * @return void
     */
    public function dropzoneStore(Request $request)
    {
        $image = $request->file('file');
        $imageName = time().$image->getClientOriginalName();

        $image->move(public_path('storage/carIMG'),$imageName);

        return response()->json(['success'=>$imageName]);
    }
}
