<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';

    //define which attributes are assignable
    protected $fillable = array('UID','CID','rent_from','rent_to'); //'position',

    // DEFINE RELATIONSHIPS ------------------------------------
    public function user()
    {
        return $this->belongsTo('User');
    }

    public function car()
    {
        return $this->belongsTo('Car');
    }
}
