<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'event_id', 'status', 'paid', 'pay_status'
    ];
    protected $table = "registration";
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
    public function event(){
    return $this->belongsToMany('App\Event');
	}

}