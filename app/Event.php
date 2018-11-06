<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Event extends Authenticatable
{
    use Notifiable;

    public function categories() {
          return $this->belongsToMany('App\Category', 'category_event','event_id','category_id');
        }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'place', 'address', 'max_participant','participant_amount', 'begin_time', 'end_time', 'signup_time'
    ];

    protected $table = "event";

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function registrations(){
        return $this->hasMany('App\Registration','event_id');
    }
    // each event has ONE user which it recognises by it's id
    public function user(){
        return $this->hasOne('App\user','id', 'user_id');
    }
    // public function user() {
    //     return $this->belongsTo('App\User');
    // }
}
