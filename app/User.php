<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'avatar', 'password', 'activation_code', 'is_active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function cars(){
        return $this->hasMany('App\Car');
    }

    public function reservations(){
        return $this->hasMany('App\Reservations');
    }

    public function feedbacks(){
        return $this->belongsTo('App\Feedback');
    }
}
