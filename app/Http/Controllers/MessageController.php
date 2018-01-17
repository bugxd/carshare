<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Message;
use App\User;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function showMessages()
    {
        //Hier ist die Datenbank Query
        $messages=Message::where('empfaengerID', Auth::user()->id)->orderBy('created_at','desc')->paginate(5);
        return view('messages/showMessages')->with('messages', $messages);
    }
    
    public function writeMessage($carUser_id)
    {
        $user = User::where('id', $carUser_id)->first();
        return view('messages/writeMessage')->with('user', $user);
    }
    
    public function create(Request $request, User $carUser)
    {
        //erstellt eine neue Nachricht
        $items = $request->validate([
            'betreff'=> 'required',
            'inhalt'=> 'required'
        ]);
       //Datenbank Eintrag erstellen
       $newMessage = new Message();
       $newMessage->betreff = $request->input('betreff');
       $newMessage->inhalt = $request->input('inhalt');
       $newMessage->senderID = $request->user()->id;
       $newMessage->empfaengerID = $carUser->id;
       $newMessage->save();
        
       return redirect('messages');
    }
}