<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    //link to database table
    protected $table = 'pictures';

    //define which attributes are assignable
    protected $fillable = ['imgName','car_id'];

    // DEFINE RELATIONSHIPS ------------------------------------
    public function cars(){
        return $this->belongsTo('App\Car');
    }
}
