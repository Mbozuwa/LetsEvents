<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
	/**
	* The attributes that are mass assignable.
	**/
	protected $fillable = ['name'];

	/**
	* The table associated with the model.
	*/
	protected $table = 'category';

    public function parent(){
        return $this->belongsTo('\App\Categories');
    }
}
