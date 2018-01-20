<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Picture;

class Car extends Model
{
    //link to database table
    protected $table = 'cars';

    //define which attributes are assignable
    protected $fillable = array('brand', 'car_type', 'color', 'licence_plate', 'nr_of_seats', 'weight', 'capacity', 'power', 'design_speed', 'payload', 'vertical_load', 'axe_load', 'animal_allowed', 'smoking_allowed', 'description', 'price', 'available_from','available_to', 'lat', 'lng', 'user_id'); //'position',

    // DEFINE RELATIONSHIPS ------------------------------------
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function pictures(){
        return $this->hasMany('App\Picture');
    }

}
