<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'address', 'telephone'
    ];
    protected $table = "users";
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

}
