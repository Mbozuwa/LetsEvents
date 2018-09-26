<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function User() {
        return $this->belongsTo('App\User');
    }
}
