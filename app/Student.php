<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "student";
    public function User() {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function school() {
        return $this->belongsTo('App\Schools', 'school_id');
    }
}
