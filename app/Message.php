<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //link to database table
    protected $table = 'messages';
    
    //define which attributes are assignable
    protected $fillable = array('betreff','inhalt','gelesen','senderID','empfaengerID');
    
}
